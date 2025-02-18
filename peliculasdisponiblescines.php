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
            <?php
                // Obtener el ID del cine desde la URL
                $cine_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                // Realizar la consulta para obtener las películas del cine
                $sql = "SELECT id, name, img FROM films WHERE id_cinema = ?";
                $stmt = $bbdd->prepare($sql);
                $stmt->bind_param("i", $cine_id);
                $stmt->execute();
                $result = $stmt->get_result();

                // Verificar si hay resultados
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()): ?>
                        <div class="pelicula-individual">
                            <a href="compratusentradas.php?idcine=<?= $cine_id ?>&idpeli=<?= $row['id']?>"><img src="/img/<?= htmlspecialchars($row['img']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" class="imagenes"></a>
                            <div class="pelicula_detalles_1">
                                <div class="pelicula_titulo_1"><h2><?= htmlspecialchars($row['name']) ?></h2></div>
                            </div>
                        </div>
                    <?php endwhile;
                } else {
                    echo "<p>No hay películas disponibles para este cine.</p>";
                }

                // Cerrar la conexión
                $stmt->close();
                $bbdd->close();
            ?>
        </div>
        <script src="/js/peliculasdisponibles.js"></script>
        <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </body>
</html>