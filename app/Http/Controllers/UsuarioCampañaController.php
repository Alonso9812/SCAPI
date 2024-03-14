<?php

namespace App\Http\Controllers;

use App\Models\UsuarioCampaña;
use Illuminate\Http\Request;

class UsuarioCampañaController extends Controller
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

        $usuariocampaña = UsuarioCampaña::create($data);

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
    public function show(UsuarioCampaña $usuariocampaña)
    {
        //
        $usuariocampaña = UsuarioCampaña::all();
        return $usuariocampaña;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsuarioCampaña $usuariocampaña)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsuarioCampaña $usuariocampaña)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuariocampaña = UsuarioCampaña::find($id);

    if (!$usuariocampaña) {

        return response()->json([
            "status" => 0,
            "msg" => "Usuario no encontrado."
        ], 404);
    }

    
    $usuariocampaña->delete();

    
    return response()->json([
        "status" => 1,
        "msg" => "Participación eliminado exitosamente."
    ]);
    }
}
