<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Editorial::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return Editorial::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Editorial::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->update($request->all());
        return $editorial;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->delete();
        return ['message' => 'Editorial eliminada'];
    }
}
