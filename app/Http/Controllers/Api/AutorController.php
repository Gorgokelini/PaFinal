<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Autor::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Opcional: Agregar validación aquí para robustez
        $autor = Autor::create($request->all());
        return response()->json($autor, 201); // 201: Recurso creado exitosamente
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return response()->json($autor, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return response()->json($autor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->json(['message' => 'Autor eliminado correctamente'], 200);
    }
}