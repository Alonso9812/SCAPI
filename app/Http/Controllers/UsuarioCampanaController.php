<?php

namespace App\Http\Controllers;

use App\Models\UsuarioCampana;
use Illuminate\Http\Request;

class UsuarioCampanaController extends Controller
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
            'campaña_id' => 'required',
        ]);

        $usuariocampaña = UsuarioCampana::create($data);

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
    public function show(UsuarioCampana $usuariocampana)
    {
        //
        $usuariocampana = UsuarioCampana::all();
        return $usuariocampana;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsuarioCampana $usuariocampana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsuarioCampana $usuariocampana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuariocampana = UsuarioCampana::find($id);

    if (!$usuariocampana) {

        return response()->json([
            "status" => 0,
            "msg" => "Usuario no encontrado."
        ], 404);
    }

    
    $usuariocampana->delete();

    
    return response()->json([
        "status" => 1,
        "msg" => "Participación eliminado exitosamente."
    ]);
    }
}
