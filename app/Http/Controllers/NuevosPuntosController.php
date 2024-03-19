<?php

namespace App\Http\Controllers;

use App\Models\NuevosPuntos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NuevosPuntosController extends Controller
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
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombrePunto' => 'required',
            'descripcionPunto' => 'required',
            'ubicacionPunto' => 'required',
            'galeria' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096', // Permitir archivos de hasta 4MB
        ]);

        $imagen = $request->file('galeria');
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        
        // Almacenar la imagen en el directorio public/galeria
        $imagen->move(public_path('storage\galeria'), $nombreImagen);

        $nuevosPuntos = new NuevosPuntos();
        $nuevosPuntos->nombrePunto = $request->input('nombrePunto');
        $nuevosPuntos->descripcionPunto = $request->input('descripcionPunto');
        $nuevosPuntos->ubicacionPunto = $request->input('ubicacionPunto');
        $nuevosPuntos->galeria = $nombreImagen;
        $nuevosPuntos->save();

        return response()->json([
            'status' => 1,
            'msg' => '¡Nuevo punto de interés agregado exitosamente!',
        ]);
    }

    public function showImage($nombreImagen)
    {
        $rutaImagen = storage_path('app/public/galeria/' . $nombreImagen);
    
        if (!file_exists($rutaImagen)) {
            abort(404);
        }
    
        return response()->file($rutaImagen);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(NuevosPuntos $nuevosPuntos)
    {
        $nuevosPuntos = NuevosPuntos::all();
        return $nuevosPuntos;
    }

    public function showCount(NuevosPuntos $nuevosPuntos)
    {
        $count = NuevosPuntos::all()->count();
        return response()->json(['count' => $count]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NuevosPuntos $nuevosPuntos)
    {
        //
    }

    public function editStatus(Request $request, $id)
    {
        $nuevosPuntos = NuevosPuntos::find($id);
    
        if (!$nuevosPuntos) {
            return response()->json([
                "status" => 0,
                "msg" => "¡Punto de interes no encontrado!"
            ], 404);
        }
    
        $request->validate([
            'statusPunto' => 'required|in:Activo,Inactivo', // Agregado para validar el campo 'status'
        ]);
    
        // Asignar el valor solo si está presente en la solicitud
        $nuevosPuntos->statusPunto = $request->input('statusPunto', $nuevosPuntos->statusPunto); // Campo 'status' agregado
    
        $nuevosPuntos->save();
    
        return response()->json([
            "status" => 1,
            "msg" => "¡Actualizado Correctamente!"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nuevosPuntos = NuevosPuntos::find($id);

        if (!$nuevosPuntos) {
            return response()->json(['message' => 'Punto de interés sostenible no encontrado'], 404);
        }

        $request->validate([
            'nombrePunto' => 'required',
            'descripcionPunto' => 'required',
            'ubicacionPunto' => 'required',
            
        ]);

        

        $nuevosPuntos->nombrePunto = $request->input('nombrePunto');
        $nuevosPuntos->descripcionPunto = $request->input('descripcionPunto');
        $nuevosPuntos->ubicacionPunto = $request->input('ubicacionPunto');
        $nuevosPuntos->save();

        return response()->json([
            'status' => 1,
            'msg' => '¡Punto de interés actualizado exitosamente!',
        ]);
    }

    public function showID($id)
    {
        // Buscar un usuario por su ID
        $nuevosPuntos = NuevosPuntos::find($id);

        if (!$nuevosPuntos) {
            return response()->json(['message' => 'Punto de interes sostenible no encontrado'], 404);
        }

        return response()->json($nuevosPuntos);
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NuevosPuntos $nuevosPuntos, $id)
    {
        // Buscar el punto de interés por su ID
        $nuevosPuntos = NuevosPuntos::find($id);
    
        if (!$nuevosPuntos) {
            return response()->json([
                "status" => 0,
                "msg" => "Punto no encontrado."
            ], 404);
        }
    
        // Obtener el nombre de la imagen antes de eliminar el modelo
        $nombreImagen = $nuevosPuntos->galeria;
    
        // Eliminar la imagen del directorio de almacenamiento si existe
        if ($nombreImagen && file_exists(public_path("storage/galeria/{$nombreImagen}"))) {
            unlink(public_path("storage/galeria/{$nombreImagen}"));
        }
    
        // Eliminar el modelo NuevosPuntos
        $nuevosPuntos->delete();
    
        return response()->json([
            "status" => 1,
            "msg" => "Punto eliminado exitosamente."
        ]);
    }
}
