<script>
    const API_CATEGORIA = '/api/categoria';

    document.addEventListener('DOMContentLoaded', listarCategorias);

    async function listarCategorias() {
        const { data: categorias } = await axios.get(API_CATEGORIA);
        let html = '';
        categorias.forEach(categoria => {
            html += `
                <tr>
                    <td>${categoria.id}</td>
                    <td>${categoria.nombre}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editarCategoria(${categoria.id})">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="eliminarCategoria(${categoria.id})">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        document.getElementById('tbody-categorias').innerHTML = html;
    }

    function nuevaCategoria() {
        document.getElementById('tituloModalCategoria').innerText = 'Registrar Categoría';
        document.getElementById('categoriaForm').reset();
        document.getElementById('categoria_id').value = '';
    }

    async function editarCategoria(id) {
        const { data: categoria } = await axios.get(`${API_CATEGORIA}/${id}`);
        document.getElementById('tituloModalCategoria').innerText = 'Editar Categoría';
        document.getElementById('categoria_id').value = categoria.id;
        document.getElementById('nombre').value = categoria.nombre;
        new bootstrap.Modal(document.getElementById('categoriaModal')).show();
    }

    document.getElementById('btnGuardar').addEventListener('click', async function () {
        const id = document.getElementById('categoria_id').value;
        const nombre = document.getElementById('nombre').value;

        try {
            if (id === '') {
                await axios.post(API_CATEGORIA, { nombre });
            } else {
                await axios.put(`${API_CATEGORIA}/${id}`, { nombre });
            }
            bootstrap.Modal.getOrCreateInstance(document.getElementById('categoriaModal')).hide();
            listarCategorias();
        } catch (error) {
            alert('Error al guardar. Revisa los datos e intenta de nuevo.');
            console.error(error);
        }
    });

    async function eliminarCategoria(id) {
        if (!confirm('¿Seguro que deseas eliminar esta categoría?')) return;
        await axios.delete(`${API_CATEGORIA}/${id}`);
        listarCategorias();
    }
</script>