document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners for "Ver Detalles" buttons
    const verDetallesButtons = document.querySelectorAll('.boton');
    verDetallesButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            toggleCineInfo(id);
        });
    });

    // Add event listeners for image hover
    const movieImages = document.querySelectorAll('.cine-individual img');
    movieImages.forEach(image => {
        image.addEventListener('mouseover', () => {
            image.classList.add('highlight-cines'); // Añade la clase 'highlight' al pasar el mouse
        });

        image.addEventListener('mouseout', () => {
            image.classList.remove('highlight-cines'); // Elimina la clase 'highlight' al salir el mouse
        });
    });
});

function toggleCineInfo(id) {
    const info = document.getElementById('cine-info-' + id);
    if (info.style.display === 'none' || info.style.display === '') {
        info.style.display = 'block';
    } else {
        info.style.display = 'none';
    }
}