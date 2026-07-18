<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index() 
    {
        $libros = Libro::with(['autor', 'categoria', 'editorial'])->get();
        return response()->json($libros, 200);
    }

    public function store(Request $request) 
    {
        $libro = Libro::create($request->all());
        return response()->json($libro, 201); // 201: Created
    }

    public function show($id) 
    {
        $libro = Libro::with(['autor', 'categoria', 'editorial'])->findOrFail($id);
        return response()->json($libro, 200);
    }

    public function update(Request $request, $id) 
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return response()->json($libro, 200);
    }

    public function destroy($id) 
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return response()->json(['message' => 'Libro eliminado con éxito'], 200);
    }
}