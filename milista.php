<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Lista - Maciflix</title>
    <link rel="stylesheet" href="css/estilosmilista.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <iframe src="header.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <div class="container">
        <h1>Mi Lista</h1>

        <div id="movies-list" class="movies-grid">
            <!-- Las películas se cargarán dinámicamente aquí -->
        </div>
    </div>

    <iframe src="footer.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <script>
        // Función para cargar y mostrar las películas guardadas
        function loadMovies() {
            const moviesList = document.getElementById('movies-list');
            moviesList.innerHTML = ''; // Limpiar la lista
            
            // Obtener películas de localStorage
            const movies = JSON.parse(localStorage.getItem('myMovies') || '[]');
            
            if (movies.length === 0) {
                moviesList.innerHTML = '<p>No tienes películas en tu lista.</p>';
                return;
            }

            movies.forEach(movie => {
                const movieItem = document.createElement('div');
                movieItem.className = 'movie-item';
                movieItem.innerHTML = `
                    <img src="img/${movie.img}" alt="${movie.name}">
                    <h3>${movie.name}</h3>
                    <button onclick="removeFromList(${movie.id})">Eliminar</button>
                `;
                moviesList.appendChild(movieItem);
            });
        }

        // Función para eliminar una película de la lista
        function removeFromList(movieId) {
            if (confirm('¿Estás seguro de que quieres eliminar esta película de tu lista?')) {
                let movies = JSON.parse(localStorage.getItem('myMovies') || '[]');
                movies = movies.filter(movie => movie.id !== movieId);
                localStorage.setItem('myMovies', JSON.stringify(movies));
                loadMovies();
            }
        }

        // Cargar películas al abrir la página
        loadMovies();
    </script>
</body>
</html>
