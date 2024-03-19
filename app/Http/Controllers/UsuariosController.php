<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
//use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Hash; // Import Hash
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log; 

use Tymon\JWTAuth\Facades\JWTAuth; // Importa JWTAuth
use Tymon\JWTAuth\Exceptions\JWTException;

class UsuariosController extends Controller
{
    
    public function index()
    {

    }

    public function createUsuarios(Request $request)
    {
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $usuarios = Usuarios::all();
        
        return response()->json([
            'status' => 'success',
            'data' => $usuarios,
        ]);
    }

    public function showID($id)
    {
        // Buscar un usuario por su ID
        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editStatus(Request $request, $id)
    {
        $usuario = Usuarios::find($id);
    
        if (!$usuario) {
            return response()->json([
                "status" => 0,
                "msg" => "¡Usuario no encontrado!"
            ], 404);
        }
    
        $request->validate([
            'status' => 'required|in:Activo,Inactivo', // Agregado para validar el campo 'status'
        ]);
    
        // Asignar el valor solo si está presente en la solicitud
        $usuario->status = $request->input('status', $usuario->status); // Campo 'status' agregado
    
        $usuario->save();
    
        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizado Correctamente!"
        ]);
    }
    

public function loginAdmin(Request $request)
{
    // Validación de los datos de entrada
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Intenta autenticar al usuario
    if (!Auth::attempt($request->only('email', 'password'))) {
        // Si la autenticación falla, devuelve una respuesta de error
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized',
        ], 401);
    }

    // Obtiene al usuario autenticado
    $user = Auth::user();

    // Verifica si el usuario tiene el rol de administrador
    if ($user->rol !== 'admin') {
        // Si el usuario no es un administrador, devuelve una respuesta de error
        return response()->json([
            'status' => 'error',
            'message' => 'El usuario no tiene el rol de administrador',
        ], 403);
    }

    // Genera el token JWT para el usuario autenticado
    $token = Auth::guard('api')->login($user);

    // Devuelve una respuesta JSON con el usuario y el token JWT
    return response()->json([
        'status' => 'success',
        'user' => $user,
        'authorisation' => [
            'token' => $token,
            'type' => 'bearer',
        ]
    ]);
}
    

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    try {
        if (! $token = JWTAuth::attempt($credentials)) {
            // Log de intento de inicio de sesión fallido
            Log::info('Inicio de sesión fallido para el usuario: ' . $credentials['email']);
            
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    } catch (JWTException $e) {
        // Log de error al crear el token
        Log::error('Error al crear el token: ' . $e->getMessage());
        
        return response()->json(['error' => 'Could not create token'], 500);
    }

    // Log de inicio de sesión exitoso
    Log::info('Inicio de sesión exitoso para el usuario: ' . $credentials['email']);
    
    return response()->json(compact('token'));
}




    public function UsuarioProfile(){

        return response()->json([
            "status" => 0,
            "msg" => "acerca del usuario",
            "data" => auth()->user()
        ]);
    }
    
    public function updateUsuario(Request $request, $id)
    {
        
    
        $usuarios = Usuarios::find($id);

        if (!$usuarios) {
            return response()->json([
                "status" => 0,
                "msg" => "¡Usuario no encontrado!" // Cambié el mensaje de error
            ], 404);
        }
        
        $request->validate([
            
            'rol' => 'required|in:admin,voluntario', 
        ]);
        $usuarios->nombre = $request->input('nombre', $usuarios->nombre);
        $usuarios->apell1 = $request->input('apell1', $usuarios->apell1);
        $usuarios->apell2 = $request->input('apell2', $usuarios->apell2);
        $usuarios->cedula = $request->input('cedula', $usuarios->cedula);
        $usuarios->numero = $request->input('numero', $usuarios->numero);
        $usuarios->ocupacion = $request->input('ocupacion', $usuarios->ocupacion);
        $usuarios->rol = $request->input('rol', $usuarios->rol);
        $usuarios->email = $request->input('email', $usuarios->email);
        
        $usuarios->save();
        
        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizado Correctamente!"
        ]);
        
    }



    public function updateUsuarioAdmin(Request $request, Usuarios $id)
    {
        if (Usuarios::where([])){
        }else{}
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $usuarios = Usuarios::find($id);

    if (!$usuarios) {

        return response()->json([
            "status" => 0,
            "msg" => "Usuario no encontrado."
        ], 404);
    }

    
    $usuarios->delete();

    
    return response()->json([
        "status" => 1,
        "msg" => "Usuario eliminado exitosamente."
    ]);

}
}
