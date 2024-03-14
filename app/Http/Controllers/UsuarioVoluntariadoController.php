<?php

namespace App\Http\Controllers;

use App\Models\UsuarioVoluntariado;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            'usuario_id' => 'required',
            'voluntariado_id' => 'required',
        ]);

        $usuarioVoluntariado = UsuarioVoluntariado::create($data);

        return response([
            "status" => 1,
            "msg" => "¡Datos agregados exitosamente!"
        ]);
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

    
    $usuarioVoluntariado->delete();

    
    return response()->json([
        "status" => 1,
        "msg" => "Participación eliminado exitosamente."
    ]);
    }
}
