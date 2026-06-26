<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index() {
       return Libro::with(['autor', 'categoria', 'editorial'])->get();
    }
 /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        return Libro::create($request->all());
    }
  /**
     * Display the specified resource.
     */
    public function show($id) {
        return Libro::with(['autor', 'categoria', 'editorial'])->findOrFail($id);
    }
 /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return $libro;
    }
   /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
       $libro = Libro::findOrFail($id);
        $libro->delete();
        return ['message' => 'Libro eliminado'];
    }
}
