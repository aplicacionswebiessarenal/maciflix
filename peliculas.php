<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PELICULAS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title><?php echo $pelicula['name']; ?></title>
</head>

<body>
    <?php
    require_once("conexion.php");
    $conn = $bbdd;
    $sql = "SELECT * FROM films WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $pelicula = $result->fetch_assoc();
    } else {
        echo "Película no encontrada.";
        exit;
    }

    ?>

    <iframe src="header.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    <div id="search-bar">
        <input type="text" placeholder="Buscar películas...">
    </div>
    <div class="movies-container">
        <?php
        $sql = "SELECT * FROM films WHERE home=1";
        $result = $bbdd->query($sql);
        if ($result->num_rows > 0) {
            // hay información que mostrar
            while ($row = $result->fetch_assoc()) {
                echo "<div>
                      <a href='pelicula.php?id=" . $row['id'] . "'>
                        <img src='img/" . htmlspecialchars($row['img']) . "' alt='" . htmlspecialchars($row['name']) . "' />
                      </a>
                    </div>";
            }
        } else {

            echo "Sin información ingresada aún";
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