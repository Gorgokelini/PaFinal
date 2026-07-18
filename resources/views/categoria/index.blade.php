@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Gestión de Categorías</h2>
        <button class="btn btn-primary" onclick="nuevaCategoria()" data-bs-toggle="modal"
            data-bs-target="#categoriaModal">Nueva Categoría</button>
        <div id="tabla-contenedor" class="mt-3">
            @include('categoria.tabla')
        </div>
    </div>
    @include('categoria.modal')
    @include('categoria.scripts')
@endsection