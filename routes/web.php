<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Autor;
use App\Models\Libro;
use App\Models\Categoria;
use App\Models\Editorial;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::middleware(['auth'])->group(function () {


    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::get('/autores', function () {
        $autores = Autor::all();
        return view('autor.index', compact('autores'));
    })->name('autores.index');

    Route::get('/libros', function () {
        $libros = Libro::all();
        return view('libro.index', compact('libros'));
    })->name('libros.index');

    Route::get('/categorias', function () {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    })->name('categorias.index');

    Route::get('/editoriales', function () {
        $editoriales = Editorial::all();
        return view('editorial.index', compact('editoriales'));
    })->name('editoriales.index');

});