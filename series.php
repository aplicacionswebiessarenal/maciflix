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
</head>
<body>
    <iframe src="header.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    <header>
        <h1>Series</h1>
    </header>
    <main>
        <div class="series-container">
            <?php
            $sql = "SELECT id, name, img FROM series"; // Asegúrate de que 'name' es la columna correcta
            $result = $bbdd->query($sql);
            while ($row = $result->fetch_assoc()): ?>
                <div class="serie">
                    <a href="serie1.php?id=<?= $row['id'] ?>">
                        <img src="<?= htmlspecialchars($row['img']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                        <span><?= htmlspecialchars($row['name']) ?></span>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    <footer>
        <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </footer>
</body>
</html>

<?php $bbdd->close(); ?>