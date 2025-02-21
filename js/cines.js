const movieImages = document.querySelectorAll('.cine-individual img');
movieImages.forEach(image => {
    image.addEventListener('mouseover', () => {
        image.classList.add('highlight-cines'); // Añade la clase 'highlight' al pasar el mouse
    });

    image.addEventListener('mouseout', () => {
        image.classList.remove('highlight-cines'); // Elimina la clase 'highlight' al salir el mouse
    });
});

function toggleDescription(id) {
    const desc = document.getElementById('desc-' + id);
    if (desc.style.display === 'none' || desc.style.display === '') {
        desc.style.display = 'block';
    } else {
        desc.style.display = 'none';
    }
}