<script>
    const API_LIBRO = '/api/libro';

    document.addEventListener('DOMContentLoaded', () => {
        cargarSelects();
        listarLibros();
    });

    async function cargarSelects() {
        const [autores, categorias, editoriales] = await Promise.all([
            axios.get('/api/autor'),
            axios.get('/api/categoria'),
            axios.get('/api/editorial'),
        ]);
        document.getElementById('autor_id').innerHTML =
            autores.data.map(a => `<option value="${a.id}">${a.nombre} ${a.apellido}</option>`).join('');
        document.getElementById('categoria_id').innerHTML =
            categorias.data.map(c => `<option value="${c.id}">${c.nombre}</option>`).join('');
        document.getElementById('editorial_id').innerHTML =
            editoriales.data.map(e => `<option value="${e.id}">${e.nombre}</option>`).join('');
    }

async function listarLibros() {
    const { data: libros } = await axios.get(API_LIBRO);
    let html = '';
    libros.forEach(libro => {
        html += `
            <tr>
                <td>${libro.id}</td>
                <td>${libro.titulo}</td>
                <td>${libro.autor ? libro.autor.nombre + ' ' + libro.autor.apellido : ''}</td>
                <td>${libro.categoria ? libro.categoria.nombre : ''}</td>
                <td>${libro.editorial ? libro.editorial.nombre : ''}</td>
                <td>${libro.anio ?? ''}</td>
                <td>
                    <button class="btn btn-sm btn-warning" onclick="editarLibro(${libro.id})">Editar</button>
                    <button class="btn btn-sm btn-danger" onclick="eliminarLibro(${libro.id})">Eliminar</button>
                </td>
            </tr>
        `;
    });
    document.getElementById('tbody-libros').innerHTML = html;
}

    function nuevoLibro() {
        document.getElementById('tituloModalLibro').innerText = 'Registrar Libro';
        document.getElementById('libroForm').reset();
        document.getElementById('libro_id').value = '';
    }

    async function editarLibro(id) {
        const { data: libro } = await axios.get(`${API_LIBRO}/${id}`);
        document.getElementById('tituloModalLibro').innerText = 'Editar Libro';
        document.getElementById('libro_id').value = libro.id;
        document.getElementById('titulo').value = libro.titulo;
        document.getElementById('anio').value = libro.anio;
        document.getElementById('autor_id').value = libro.autor_id;
        document.getElementById('categoria_id').value = libro.categoria_id;
        document.getElementById('editorial_id').value = libro.editorial_id;
        new bootstrap.Modal(document.getElementById('libroModal')).show();
    }

    document.getElementById('btnGuardar').addEventListener('click', async function () {
        const id = document.getElementById('libro_id').value;
        const payload = {
            titulo: document.getElementById('titulo').value,
            anio: document.getElementById('anio').value,
            autor_id: document.getElementById('autor_id').value,
            categoria_id: document.getElementById('categoria_id').value,
            editorial_id: document.getElementById('editorial_id').value,
        };

        try {
            if (id === '') {
                await axios.post(API_LIBRO, payload);
            } else {
                await axios.put(`${API_LIBRO}/${id}`, payload);
            }
            bootstrap.Modal.getOrCreateInstance(document.getElementById('libroModal')).hide();
            listarLibros();
        } catch (error) {
            alert('Error al guardar. Revisa los datos e intenta de nuevo.');
            console.error(error);
        }
    });

    async function eliminarLibro(id) {
        if (!confirm('¿Seguro que deseas eliminar este libro?')) return;
        await axios.delete(`${API_LIBRO}/${id}`);
        listarLibros();
    }
</script>