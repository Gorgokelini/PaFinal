<script>
    const API_AUTOR = '/api/autor';

    document.addEventListener('DOMContentLoaded', listarAutores);

    async function listarAutores() {
        const { data: autores } = await axios.get(API_AUTOR);
        let html = '';
        autores.forEach(autor => {
            html += `
                <tr>
                    <td>${autor.id}</td>
                    <td>${autor.nombre}</td>
                    <td>${autor.apellido}</td>
                    <td>${autor.nacionalidad}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editarAutor(${autor.id})">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="eliminarAutor(${autor.id})">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        document.getElementById('tbody-autores').innerHTML = html;
    }

    function nuevoAutor() {
        document.getElementById('tituloModalAutor').innerText = 'Registrar Autor';
        document.getElementById('autorForm').reset();
        document.getElementById('autor_id').value = '';
    }

    async function editarAutor(id) {
        const { data: autor } = await axios.get(`${API_AUTOR}/${id}`);
        document.getElementById('tituloModalAutor').innerText = 'Editar Autor';
        document.getElementById('autor_id').value = autor.id;
        document.getElementById('nombre').value = autor.nombre;
        document.getElementById('apellido').value = autor.apellido;
        document.getElementById('nacionalidad').value = autor.nacionalidad;
        new bootstrap.Modal(document.getElementById('autorModal')).show();
    }

    document.getElementById('btnGuardar').addEventListener('click', async function () {
        const id = document.getElementById('autor_id').value;
        const payload = {
            nombre: document.getElementById('nombre').value,
            apellido: document.getElementById('apellido').value,
            nacionalidad: document.getElementById('nacionalidad').value,
        };

        try {
            if (id === '') {
                await axios.post(API_AUTOR, payload);
            } else {
                await axios.put(`${API_AUTOR}/${id}`, payload);
            }
            bootstrap.Modal.getOrCreateInstance(document.getElementById('autorModal')).hide();
            listarAutores();
        } catch (error) {
            alert('Error al guardar. Revisa los datos e intenta de nuevo.');
            console.error(error);
        }
    });

    async function eliminarAutor(id) {
        if (!confirm('¿Seguro que deseas eliminar este autor?')) return;
        await axios.delete(`${API_AUTOR}/${id}`);
        listarAutores();
    }
</script>