<?php include_once('conexion.php'); 

// Obtener el ID de la serie seleccionada
$id_serie = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Obtener detalles de la serie
$sql_serie = "SELECT name AS title, img AS img FROM series WHERE id = ?";
$stmt_serie = $bbdd->prepare($sql_serie);
$stmt_serie->bind_param("i", $id_serie);
$stmt_serie->execute();
$result_serie = $stmt_serie->get_result();
$serie = $result_serie->fetch_assoc();

// Obtener capítulos de la serie
$sql_capitulos = "SELECT title, img FROM capitulos WHERE serie_id = ?";
$stmt_capitulos = $bbdd->prepare($sql_capitulos);
$stmt_capitulos->bind_param("i", $id_serie);
$stmt_capitulos->execute();
$result_capitulos = $stmt_capitulos->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($serie['title']) ?></title>
    <link rel="stylesheet" href="css/estilosseries1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <iframe src="header.html" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    <header>
        <h1><?= htmlspecialchars($serie['title']) ?></h1>
    </header>
    <main>
        <div class="serie-detalle">
            <img src="<?= htmlspecialchars($serie['img']) ?>" alt="<?= htmlspecialchars($serie['title']) ?>" class="imagen-serie">
            <div class="detalle-serie">
                <h2><?= htmlspecialchars($serie['title']) ?></h2>
                <p>Descripción de la serie aquí.</p>
            </div>
        </div>
        
        <!-- Temporadas -->
        <div class="temporadas">
            <h3>Capítulos</h3>
            <div class="capitulos-container">
                <?php while ($capitulo = $result_capitulos->fetch_assoc()): ?>
                    <div class="capitulo">
                        <img src="<?= htmlspecialchars($capitulo['img']) ?>" alt="<?= htmlspecialchars($capitulo['title']) ?>">
                        <span><?= htmlspecialchars($capitulo['title']) ?></span>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="botonseries">
            <a href="series.php" class="volveraseries">Atrás</a>
        </div>
    </main>
    <footer>
        <iframe src="footer.html" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </footer>
</body>
</html>

<?php
$stmt_serie->close();
$stmt_capitulos->close();
$bbdd->close();
?>