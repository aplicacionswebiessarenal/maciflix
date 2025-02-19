<? include_once("/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Película</title>
    <link rel="stylesheet" href="css/pelicula.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>     
<body>

<iframe src="header.php"
onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
<?php
    require_once("conexion.php");
    $conn = $bbdd;
    $sql = "SELECT * FROM films WHERE id =1";
    $result = $conn->query($sql);

    if ($result->num_rows >0) {
        for ($i = 0; $i < $result->num_rows; $i++) {
            $pelicula = $result->fetch_assoc();
            echo ": " . $pelicula['name'] . "<br>";
            // Agrega más campos si es necesario
        }
    } else {
        echo "Película no encontrada.";
        exit;
    }

    ?>
    <div class="movie-details-container">
        <h1 id="movie-title"></h1> 
    </div>
    <div class="Resumen-pelicula">
        <p></p>
    </div>
    <div class="Options">
        <button onclick="addToList()">Añadir a mi lista</button>
        <button onclick="goToCinema()">Ir al cine</button>
    </div>
    <iframe src="footer.php"
    onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>