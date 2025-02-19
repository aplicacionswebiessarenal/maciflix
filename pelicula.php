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
    $sql = "SELECT * FROM films WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $pelicula = $result->fetch_assoc();
    } else {
        echo "Película no encontrada.";
        exit;
    }

    ?>
   
    <iframe src="footer.php"
    onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>