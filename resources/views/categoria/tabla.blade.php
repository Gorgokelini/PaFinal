<table class="table">
    <thead><tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id }}</td>
            <td>{{ $categoria->nombre }}</td>
            <td><button class="btn btn-sm btn-warning">Editar</button></td>
        </tr>
        @endforeach
    </tbody>
</table>