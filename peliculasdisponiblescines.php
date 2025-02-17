<?php include_once('conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <title>Maciflix</title>
        <link rel="stylesheet" href="css/peliculasdisponibles.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/footer.css">
    </head>
    <body>
        <iframe src="header.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
        <!-- Titulo -->
        <h1>Peliculas</h1>
        <!-- Las peliculas disponibles -->
        <div class="contenedor-de-peliculas">
            <div class="pelicula-individual">
                <a href="compratusentradas.php"><img src="/img/avatar.png"
                        alt="Avatar" class="imagenes"></a>
                <div class="pelicula_detalles_1">
                    <div class="pelicula_titulo_1"><h2>Avatar</h2></div>
                </div>
            </div>
            <div class="pelicula-individual">
                <a href="compratusentradas.php"><img src="/img/sonic3.jpg"
                        alt="Sonic 3" class="imagenes"></a>
                <div class="pelicula_detalles_1">
                    <div class="pelicula_titulo_1"><h2>Sonic 3</h2></div>
                </div>
            </div>
            <div class="pelicula-individual">
                <a href="compratusentradas.php"><img
                        src="/img/mansionenbrujada.jpeg" alt="Mansion Enbrujada"
                        class="imagenes">
                </a>
                <div class="pelicula_detalles_1">
                    <div class="pelicula_titulo_1"><h2>Mansión Enbrujada</h2></div>
                </div>
            </div>
            <div class="pelicula-individual">
                <a href="compratusentradas.php"><img src="/img/avengers.jpg"
                        alt="avengers" class="imagenes"></a>
                <div class="pelicula_detalles_1">
                    <div class="pelicula_titulo_1"><h2>Avengers</h2></div>
                </div>
            </div>
            <script src="/js/peliculasdisponibles.js"></script>
        </div>
        <iframe
            src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"
        ></iframe>
    </body>
</html>