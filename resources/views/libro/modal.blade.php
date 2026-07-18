<div class="modal fade" id="libroModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="tituloModalLibro">Registrar Libro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="libroForm">
                    <input type="hidden" id="libro_id">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Año</label>
                        <input type="number" name="anio" id="anio" class="form-control" placeholder="2026">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor</label>
                        <select name="autor_id" id="autor_id" class="form-control"></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-control"></select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Editorial</label>
                        <select name="editorial_id" id="editorial_id" class="form-control"></select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
            </div>
        </div>
    </div>
</div>