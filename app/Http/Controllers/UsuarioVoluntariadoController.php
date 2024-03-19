<?php

namespace App\Http\Controllers;

use App\Models\UsuarioVoluntariado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Firebase\JWT\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;



class UsuarioVoluntariadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            // Obtiene el usuario autenticado desde el token JWT
            $user = JWTAuth::parseToken()->authenticate();
            
            // Obtiene el ID del usuario autenticado
            $userId = $user->id;
    
            // Valida los datos recibidos en la solicitud
            $data = $request->validate([
                'voluntariado_id' => 'required',
            ]);
    
            // Agrega el user_id al array de datos
            $data['user_id'] = $userId;
    
            // Crea el registro en la base de datos
            $usuarioVoluntariado = UsuarioVoluntariado::create($data);
    
            // Devuelve una respuesta exitosa con información del registro creado
            return response()->json([
                "status" => 1,
                "msg" => "¡Datos agregados exitosamente!",
                "usuarioVoluntariado" => $usuarioVoluntariado
            ]);
        } catch (\Exception $e) {
            // Maneja cualquier excepción que pueda ocurrir
            return response()->json([
                "status" => 0,
                "msg" => "Error al agregar datos: " . $e->getMessage()
            ], 500); // Código de estado 500 para error interno del servidor
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UsuarioVoluntariado $usuarioVoluntariado)
    {
        $usuarioVoluntariado = UsuarioVoluntariado::all();
        return $usuarioVoluntariado;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsuarioVoluntariado $usuarioVoluntariado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsuarioVoluntariado $usuarioVoluntariado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuarioVoluntariado = UsuarioVoluntariado::find($id);

        if (!$usuarioVoluntariado) {
            return response()->json([
                "status" => 0,
                "msg" => "Usuario no encontrado."
            ], 404);
        }

        try {
            $usuarioVoluntariado->delete();
            return response()->json([
                "status" => 1,
                "msg" => "Participación eliminada exitosamente."
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg" => "Error al eliminar la participación."
            ], 500);
        }
    }
}
