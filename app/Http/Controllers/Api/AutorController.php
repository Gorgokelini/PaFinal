<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
       return Autor::all();
    }
  /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
       return Autor::create($request->all());
    }
   /**
     * Display the specified resource.
     */
    public function show($id) {
     return Autor::findOrFail($id);
    }
 /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
       $autor = Autor::findOrFail($id);
        $autor->update($request->all());
        return $autor;
    }
  /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return ['message' => 'Autor eliminado'];
    }
}