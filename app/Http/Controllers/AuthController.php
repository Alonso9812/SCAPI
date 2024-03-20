<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash; // Import Hash
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log; 

use Tymon\JWTAuth\Facades\JWTAuth; // Importa JWTAuth
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (!$token = Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
    
        $user = Auth::user();
    
        // Genera el token JWT con reclamaciones personalizadas
        $token = Auth::claims(['user_id' => $user->id, 'name' => $user->name,'rol' => $user->rol,])->login($user);
    
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }
    
    

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'apell1' => 'required|string|max:255',
            'apell2' => 'required|string|max:255',
            'cedula' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'ocupacion' => 'required|string|max:255', 
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apell1' => $request->apell1,
            'apell2' => $request->apell2,
            'cedula' => $request->cedula,
            'numero' => $request->numero,
            'ocupacion' => $request->ocupacion,
            
        ]);
    
        // Autenticar al usuario recién registrado
        // Generar un token para el usuario autenticado
        
        $token = JWTAuth::fromUser($user);
    
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
    
        // Obtener el usuario que se va a actualizar
        $targetUser = User::findOrFail($id);
    
        // Verificar si el usuario autenticado tiene permisos para actualizar el usuario objetivo
        if ($user->hasRole('admin')) {
            // Validar los datos proporcionados en la solicitud
            $validatedData = $request->validate([
                'name' => 'string|max:255',
                'apell1' => 'string|max:255',
                'apell2' => 'string|max:255',
                'cedula' => 'string|max:255',
                'numero' => 'string|max:255',
                'ocupacion' => 'string|max:255',
                
            ]);
    
            // Asignar el nuevo rol al usuario objetivo
            $targetUser->rol = $validatedData['rol'];
        } else {
            // Si el usuario no es administrador, solo se le permite actualizar ciertos campos
            $validatedData = $request->validate([
                'name' => 'string|max:255',
                'apell1' => 'string|max:255',
                'apell2' => 'string|max:255',
                'cedula' => 'string|max:255',
                'numero' => 'string|max:255',
                'ocupacion' => 'string|max:255',
            ]);
        }
    
        // Actualizar los campos del usuario objetivo con los datos proporcionados en la solicitud
        $targetUser->update($validatedData);
    
        // Retornar una respuesta de éxito
        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
            'user' => $targetUser,
        ]);
    }


   

    public function editRol(Request $request, $id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                "status" => 0,
                "msg" => "¡Usuario no encontrado!"
            ], 404);
        }
    
        $request->validate([
            'rol' => 'required|in:admin,voluntario',  // Agregado para validar el campo 'status'
        ]);
    
        // Asignar el valor solo si está presente en la solicitud
        $user->rol = $request->input('rol', $user->rol); // Campo 'status' agregado
    
        $user->save();
    
        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizado Correctamente!"
        ]);
    }
    

    public function editStatus(Request $request, $id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                "status" => 0,
                "msg" => "¡Usuario no encontrado!"
            ], 404);
        }
    
        $request->validate([
            'status' => 'required|in:Activo,Inactivo', // Agregado para validar el campo 'status'
        ]);
    
        // Asignar el valor solo si está presente en la solicitud
        $user->status = $request->input('status', $user->status); // Campo 'status' agregado
    
        $user->save();
    
        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizado Correctamente!"
        ]);
    }
    
    
    
    public function showID($id)
    {
        // Buscar un usuario por su ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($user);
    }


    public function showUsers()
    {
        $user = User::all();
        
        return $user;

    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
    
        if (!$user) {
    
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no encontrado."
            ], 404);
        }
    
        
        $user->delete();
    
        
        return response()->json([
            "status" => 1,
            "msg" => "Usuario eliminado exitosamente."
        ]);
    
    }
}
