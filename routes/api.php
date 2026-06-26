<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\LibroController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\EditorialController;


Route::apiResource('autores', AutorController::class);
Route::apiResource('libros', LibroController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('editoriales', EditorialController::class);