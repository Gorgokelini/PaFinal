<script>
    $('#btnGuardar').click(function() {
        $.post('/api/editorial', $('#editorialForm').serialize(), function() {
            alert('Editorial guardada exitosamente');
            location.reload();
        });
    });
</script>