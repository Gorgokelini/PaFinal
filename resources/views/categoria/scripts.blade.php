<script>
    $('#btnGuardar').click(function() {
        $.post('/api/categoria', $('#categoriaForm').serialize(), function() {
            alert('Categoría guardada exitosamente');
            location.reload();
        });
    });
</script>