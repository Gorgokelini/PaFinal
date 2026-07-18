<script>
    $('#btnGuardar').click(function() {
        $.post('/api/autor', $('#autorForm').serialize(), function() {
            alert('Guardado');
            location.reload();
        });
    });
</script>