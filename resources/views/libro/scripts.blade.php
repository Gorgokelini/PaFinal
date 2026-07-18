<script>
    $('#btnGuardar').click(function() {
        $.post('/api/libros', $('#libroForm').serialize(), function() {
            alert('Guardado');
            location.reload();
        });
    });
</script>