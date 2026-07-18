<script>
    const API_EDITORIAL = '/api/editorial';

    document.addEventListener('DOMContentLoaded', listarEditoriales);

    async function listarEditoriales() {
        const { data: editoriales } = await axios.get(API_EDITORIAL);
        let html = '';
        editoriales.forEach(editorial => {
            html += `
                <tr>
                    <td>${editorial.id}</td>
                    <td>${editorial.nombre}</td>
                    <td>${editorial.direccion ?? ''}</td>
                    <td>${editorial.telefono ?? ''}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editarEditorial(${editorial.id})">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="eliminarEditorial(${editorial.id})">Eliminar</button>
                    </td>
                </tr>
            `;
        });
        document.getElementById('tbody-editoriales').innerHTML = html;
    }

    function nuevaEditorial() {
        document.getElementById('tituloModalEditorial').innerText = 'Registrar Editorial';
        document.getElementById('editorialForm').reset();
        document.getElementById('editorial_id').value = '';
    }

    async function editarEditorial(id) {
        const { data: editorial } = await axios.get(`${API_EDITORIAL}/${id}`);
        document.getElementById('tituloModalEditorial').innerText = 'Editar Editorial';
        document.getElementById('editorial_id').value = editorial.id;
        document.getElementById('nombre').value = editorial.nombre;
        document.getElementById('direccion').value = editorial.direccion;
        document.getElementById('telefono').value = editorial.telefono;
        new bootstrap.Modal(document.getElementById('editorialModal')).show();
    }

    document.getElementById('btnGuardar').addEventListener('click', async function () {
        const id = document.getElementById('editorial_id').value;
        const payload = {
            nombre: document.getElementById('nombre').value,
            direccion: document.getElementById('direccion').value,
            telefono: document.getElementById('telefono').value,
        };

        try {
            if (id === '') {
                await axios.post(API_EDITORIAL, payload);
            } else {
                await axios.put(`${API_EDITORIAL}/${id}`, payload);
            }
            bootstrap.Modal.getOrCreateInstance(document.getElementById('editorialModal')).hide();
            listarEditoriales();
        } catch (error) {
            alert('Error al guardar. Revisa los datos e intenta de nuevo.');
            console.error(error);
        }
    });

    async function eliminarEditorial(id) {
        if (!confirm('¿Seguro que deseas eliminar esta editorial?')) return;
        await axios.delete(`${API_EDITORIAL}/${id}`);
        listarEditoriales();
    }
</script>