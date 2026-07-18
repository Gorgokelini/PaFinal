<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\LibroController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\EditorialController;


Route::apiResource('autor', AutorController::class);
Route::apiResource('libro', LibroController::class);
Route::apiResource('categoria', CategoriaController::class);
Route::apiResource('editorial', EditorialController::class);