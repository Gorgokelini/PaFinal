<table class="table">
    <thead><tr><th>ID</th><th>Título</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($libros as $libro)
        <tr>
            <td>{{ $libro->id }}</td>
            <td>{{ $libro->titulo }}</td>
            <td><button class="btn btn-sm btn-warning">Editar</button></td>
        </tr>
        @endforeach
    </tbody>
</table>