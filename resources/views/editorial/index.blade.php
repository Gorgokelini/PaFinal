@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Gestión de Editoriales</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editorialModal">Nueva Editorial</button>
    <div id="tabla-contenedor" class="mt-3">
        @include('editoriales.tabla')
    </div>
</div>
@include('editorial.modal')
@include('editorial.scripts')
@endsection