<? include_once("/conexion.php"); ?>
<!DOCTYPE html>

  <html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PELICULAS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
    <link rel="stylesheet" href="/css/peliculas.css">
    <link rel="stylesheet" href="../css/style.css">
       <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
<?php
// Obtener el ID de la película desde la URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convertir a entero para evitar inyecciones SQL

    // Consulta para obtener la película por ID
    $sql = "SELECT * FROM peliculas WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $pelicula = $result->fetch_assoc();
    } else {
        echo "Película no encontrada.";
        exit;
    }
} else {
    echo "ID no proporcionado.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pelicula['titulo']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo $pelicula['titulo']; ?></h1>
    <img src="<?php echo $pelicula['imagen']; ?>" alt="<?php echo $pelicula['titulo']; ?>">
    <p>Clasificación: <?php echo $pelicula['clasificacion']; ?></p>
</body>
</html>

<iframe
      src="header.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"
    ></iframe>
        <div id="search-bar">
            <input type="text" placeholder="Buscar películas...">
        </div>
    </header>
    <div class="movies-container">
        <div class="movie" onclick="showPopup('Buscando a Nemo')">
            <img src="img/nemo.png" alt="Buscando a Nemo">
            <h3>Buscando a Nemo</h3>
            <span>+3 años</span>
        </div>
        <div class="movie" onclick="showPopup('Cars 2')">
            <img src="img/cars 2.png" alt="Cars 2">
            <h3>Cars 2</h3>
            <span>+3 años</span>
        </div>
        <div class="movie" onclick="showPopup('Ice Age 3')">
            <img src="img/ice age 3.png" alt="Ice Age 3">
            <h3>Ice Age 3</h3>
            <span>+7 años</span>
        </div>
        <div class="movie" onclick="showPopup('Ready Player One')">
            <img src="img/ready player one.png" alt="Ready Player One">
            <h3>Ready Player One</h3>
            <span>+12 años</span>
        </div>
        <div class="movie" onclick="showPopup('Toy Story 3')">
            <img src="img/toy story.png" alt="Toy Story 3">
            <h3>Toy Story 3</h3>
            <span>+3 años</span>
        </div>
        <div class="movie" onclick="showPopup('Uncharted')">
            <img src="img/uncharted.png" alt="Uncharted">
            <h3>Uncharted</h3>
            <span>+12 años</span>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>Opciones para la película</h2>
            <p>Para ver esta película, por favor, inicia sesión.</p>
            <div class="options">
                <button onclick="location.href='pelicula.html'">Ver pelicula</button>
            </div>
            <button onclick="hidePopup()">Cerrar</button>
        </div>
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