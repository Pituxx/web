document.querySelectorAll('.show-popup-btn').forEach(button => {
    button.addEventListener('click', function() {
        const opcion = this.getAttribute('data-opcion');
        
        // Enviar la opción al backend usando fetch
        fetch('guardar_opcion.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `opcion=${opcion}`
        })
        .then(response => response.text())
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
