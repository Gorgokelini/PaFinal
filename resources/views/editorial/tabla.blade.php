<table class="table">
    <thead><tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($editoriales as $editorial)
        <tr>
            <td>{{ $editorial->id }}</td>
            <td>{{ $editorial->nombre }}</td>
            <td><button class="btn btn-sm btn-warning">Editar</button></td>
        </tr>
        @endforeach
    </tbody>
</table>