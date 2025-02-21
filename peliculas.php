<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maciflix</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
    <link rel="stylesheet" href="css/peliculas.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <iframe src="header.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <div id="search-bar">
        <input type="text" placeholder="Buscar películas...">
    </div>
    <div class="movies-container">
        <?php
        require_once("conexion.php");
        $sql = "SELECT id, name, img, description FROM films WHERE home=1";
        $result = $bbdd->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='movie-item'>
                      <a href='pelicula.php?id=" . $row['id'] . "'>
                        <img src='img/" . htmlspecialchars($row['img']) . "' alt='" . htmlspecialchars($row['name']) . "' />
                        <h3>" . htmlspecialchars($row['name']) . "</h3>
                      </a>
                    </div>";
            }
        } else {
            echo "<p class='no-movies'>No hay películas disponibles en este momento.</p>";
        }
        ?>
    </div>

    <script>
        function showPopup(movie) {
            document.getElementById('popup').style.display = 'flex';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
    <iframe src="footer.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>

</html>
