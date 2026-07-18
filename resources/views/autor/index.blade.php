@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Gestión de Autores</h2>
        <button class="btn btn-primary" onclick="nuevoAutor()" data-bs-toggle="modal" data-bs-target="#autorModal">Nuevo
            Autor</button>
        <div id="tabla-contenedor" class="mt-3">
            @include('autor.tabla')
        </div>
    </div>
    @include('autor.modal')
    @include('autor.scripts')
@endsection