<?php include_once("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Película</title>
    <link rel="stylesheet" href="css/pelicula.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/peliculas.css">
</head>     
<body style="background-color: #141414; color: #fff;">

<iframe src="header.php"
onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

<div class="movie-details-container" style="max-width: 800px; margin: 40px auto; padding: 20px;">
    <?php
    require_once("conexion.php");
    $conn = $bbdd;
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM films WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $pelicula = $result->fetch_assoc();
            echo "<h1 id='movie-title' style='font-size: 2.5rem; margin-bottom: 20px;'>" . $pelicula['name'] . "</h1>";
            echo "<div style='display: flex; gap: 40px;'>";
            echo "<img src='img/" . $pelicula['img'] . "' alt='" . $pelicula['name'] . "' style='width: 300px; border-radius: 8px;'>";
            echo "<div class='Resumen-pelicula' style='flex: 1;'>";
            echo "<p style='line-height: 1.6; font-size: 1.1rem;'>" . $pelicula['description'] . "</p>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p style='color: #fff;'>Película no encontrada.</p>";
            exit;
        }
    } else {
        echo "<p style='color: #fff;'>ID de película no especificado.</p>";
        exit;
    }
    ?>
</div>

<div class="Options" style="text-align: center; margin: 30px 0;">
    <button onclick="addToList(<?php echo $id; ?>, '<?php echo addslashes($pelicula['name']); ?>', '<?php echo addslashes($pelicula['img']); ?>')" style="background-color: #e50914; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; margin-right: 10px;">Añadir a mi lista</button>
    <button onclick="goToCinema()" style="background-color: #333; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Ir al cine</button>
</div>

<iframe src="footer.php"
onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

<script>
    function addToList(movieId, movieName, movieImg) {
        // Enviar datos al servidor para guardar en la base de datos
        fetch('milista.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `nombre=${encodeURIComponent(movieName)}&imagen=${encodeURIComponent(movieImg)}`
        })
        .then(response => {
            if (response.ok) {
                alert('Película añadida a tu lista');
                window.location.href = 'milista.php';
            } else {
                alert('Error al añadir la película');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al añadir la película');
        });
    }


    function goToCinema() {
        // Implementar funcionalidad para ir al cine
        alert('Funcionalidad en desarrollo');
    }
</script>
</body>
</html>
