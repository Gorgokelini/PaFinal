@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Gestión de Libros</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#libroModal">Nuevo Libro</button>
    <div id="tabla-contenedor" class="mt-3">
        @include('libros.tabla')
    </div>
</div>
@include('libros.modal')
@include('libros.scripts')
@endsection