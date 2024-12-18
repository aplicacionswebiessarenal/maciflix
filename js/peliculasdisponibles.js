const movieImages = document.querySelectorAll('.pelicula-individual img');
movieImages.forEach(image => {
    image.addEventListener('mouseover', () => {
        image.classList.add('highlight-peliculas'); // Añade la clase 'highlight' al pasar el mouse
    });

    image.addEventListener('mouseout', () => {
        image.classList.remove('highlight-peliculas'); // Elimina la clase 'highlight' al salir el mouse
    });
});