<?php include_once('conexion.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maciflix - Series</title>
    <link rel="stylesheet" href="css/estilosseries.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <script src="js/series.js"></script>
</head>
<body>
    <iframe src="header.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    <header>
        <h1>Series</h1>
    </header>
    <main>
        <div class="series-container">
        <?php
        $sql = "SELECT id, name, img, description FROM series"; 
        $result = $bbdd->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()): ?>
                <div class="serie">
                    <a href="serie1.php?id=<?= htmlspecialchars($row['id']) ?>">
                        <img src="img/<?= htmlspecialchars($row['img']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                        <span><?= htmlspecialchars($row['name']) ?></span>
                    </a>
                    <button class="boton" onclick="toggleDescription(<?= htmlspecialchars($row['id']) ?>)">Ver Detalles</button>
                    <div class="description" id="desc-<?= htmlspecialchars($row['id']) ?>" style="display: none;">
                        <?= htmlspecialchars($row['description']) ?>
                    </div>
                </div>
            <?php endwhile; 
        } else {
            echo "Error en la consulta: " . htmlspecialchars($bbdd->error);
        }
        ?>
        </div>
    </main>
    <footer>
        <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </footer>
</body>
</html>