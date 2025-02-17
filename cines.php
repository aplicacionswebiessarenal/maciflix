<?php include_once('conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <title>Maciflix</title>
        <link rel="stylesheet" href="css/cines.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/footer.css">
    </head>
    <body>
    <!-- Titulo -->
    <iframe src="header.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
        <h1>Cines disponibles</h1>
    <!-- Las peliculas disponibles -->
        <div class="contenedor-de-cines">
            <?php
                $sql = "SELECT id, name, img, address, email, timetable, telephone, instagram, twitter, facebook FROM cinemas";
                $result = $bbdd->query($sql);
                while ($row = $result->fetch_assoc()): ?>
                    <div class="foto_y_nombre">
                        <div class="cine-individual">
                            <div class="fotocine">
                                <a href="peliculasdisponiblescines.php?id=<?= $row['id'] ?>">
                                    <img src="img/<?= htmlspecialchars($row['img']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                                </a>
                            </div>
                            <div class="cine_titulo">
                                <div class="cine_titulo_1"><?= htmlspecialchars($row['name']) ?></div>
                            </div>
                        </div>
                        <div class="informacion_del_cine">
                            <div class="informacion-general">
                                <span><a href="https://maps.app.goo.gl/"><?= htmlspecialchars($row['address']) ?></a></span><br>
                                <span>Teléfono de contacto: <a href="tel:<?= htmlspecialchars($row['telephone']) ?>"><?= htmlspecialchars($row['telephone']) ?></a></span><br>
                                <span>Correo electrónico: <address><a href="mailto:<?= htmlspecialchars($row['email']) ?>"><?= htmlspecialchars($row['email']) ?></a></address><br>
                                <span>Horarios de atención: <?= nl2br(htmlspecialchars($row['timetable'])) ?></span><br>
                                <span>Redes Sociales:</span>
                                <ul class="redes-sociales">
                                    <?php if ($row['facebook']): ?>
                                        <li><span><a href="<?= htmlspecialchars($row['facebook']) ?>">Facebook</a></span></li>
                                    <?php endif; ?>
                                    <?php if ($row['instagram']): ?>
                                        <li><span><a href="<?= htmlspecialchars($row['instagram']) ?>">Instagram</a></span></li>
                                    <?php endif; ?>
                                    <?php if ($row['twitter']): ?>
                                        <li><span><a href="<?= htmlspecialchars($row['twitter']) ?>">Twitter</a></span></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        </div>
        <script src="/js/cines.js"></script>
        <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </body>
</html>