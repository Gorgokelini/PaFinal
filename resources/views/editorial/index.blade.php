@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Gestión de Editoriales</h2>
        <button class="btn btn-primary" onclick="nuevaEditorial()" data-bs-toggle="modal"
            data-bs-target="#editorialModal">Nueva Editorial</button>
        <div id="tabla-contenedor" class="mt-3">
            @include('editorial.tabla')
        </div>
    </div>
    @include('editorial.modal')
    @include('editorial.scripts')
@endsection