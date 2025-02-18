<?php include_once('conexion.php'); 

$id_serie = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_serie <= 0) {
    die("ID de serie no válido.");
}

// Consulta para obtener la información de la serie
$sql_serie = "SELECT name AS title, description, img FROM series WHERE id = ?";
$stmt_serie = $bbdd->prepare($sql_serie);
$stmt_serie->bind_param("i", $id_serie);
$stmt_serie->execute();
$result_serie = $stmt_serie->get_result();
$serie = $result_serie->fetch_assoc();

if (!$serie) {
    die("Serie no encontrada.");
}

// Consulta para obtener los episodios de la serie
$sql_episodes = "SELECT id, name, description, duration, img, season FROM episodes WHERE id_serie = ?";
$stmt_episodes = $bbdd->prepare($sql_episodes);
$stmt_episodes->bind_param("i", $id_serie);
$stmt_episodes->execute();
$result_episodes = $stmt_episodes->get_result();
$episodes = $result_episodes->fetch_all(MYSQLI_ASSOC);
$seasons = [];

// Agrupar episodios por temporada
foreach ($episodes as $episode) {
    $seasons[$episode['season']][] = $episode;
}
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
    <script src="js/series.js"></script>
</head>
<body>
    <iframe
        src="header.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"
    ></iframe>
    <header>
        <div class="serie-header">
            <img src="img/<?= htmlspecialchars($serie['img']) ?>" alt="<?= htmlspecialchars($serie['title']) ?>">
            <h1><?= htmlspecialchars($serie['title']) ?></h1>
            <p id="desc-0"><?= htmlspecialchars($serie['description']) ?></p>
            <button class="leer-mas" id="btn-0" onclick="toggleDescription(0)">Leer más</button>
            <button class="reproducir" onclick="showNotification('<?= htmlspecialchars($serie['title']) ?>')">Reproducir</button>
        </div>
    </header>
    <main>
        <?php if (count($seasons) > 1): ?>
            <div class="season-selector">
                <label for="season-select">Selecciona una temporada:</label>
                <select id="season-select" onchange="showSeason(this.value)">
                    <?php foreach ($seasons as $seasonNumber => $seasonEpisodes): ?>
                        <option value="<?= $seasonNumber ?>">Temporada <?= $seasonNumber ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>
        <?php foreach ($seasons as $seasonNumber => $seasonEpisodes): ?>
            <div class="season" id="season-<?= $seasonNumber ?>" style="display: none;">
                <h2>Temporada <?= $seasonNumber ?></h2>
                <ul class="episode-list">
                    <?php foreach ($seasonEpisodes as $episode): ?>
                        <li class="episode">
                            <img src="img/<?= htmlspecialchars($episode['img']) ?>" alt="<?= htmlspecialchars($episode['name']) ?>">
                            <h3><?= htmlspecialchars($episode['name']) ?></h3>
                            <p id="desc-<?= htmlspecialchars($episode['id']) ?>"><?= htmlspecialchars($episode['description']) ?></p>
                            <button class="leer-mas" id="btn-<?= htmlspecialchars($episode['id']) ?>" onclick="toggleDescription(<?= htmlspecialchars($episode['id']) ?>)">Leer más</button>
                            <p>Duración: <?= htmlspecialchars($episode['duration']) ?> minutos</p>
                            <button class="reproducir" onclick="showNotification('<?= htmlspecialchars($episode['name']) ?>')">Ver</button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </main>
    <footer>
        <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </footer>
</body>
</html>

<?php
$stmt_serie->close();
$stmt_episodes->close();
$bbdd->close();
?>