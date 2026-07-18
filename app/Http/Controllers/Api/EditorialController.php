<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {
        return response()->json(Editorial::all(), 200);
    }

    public function store(Request $request)
    {
        
        $editorial = Editorial::create($request->all());
        return response()->json($editorial, 201); 
    }

    public function show(string $id)
    {
        $editorial = Editorial::findOrFail($id);
        return response()->json($editorial, 200);
    }

    public function update(Request $request, string $id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->update($request->all());
        return response()->json($editorial, 200);
    }

    public function destroy(string $id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->delete();
        return response()->json(['message' => 'Editorial eliminada con éxito'], 200);
    }
}