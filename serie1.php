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
$sql_episodes = "SELECT name, description, duration, season FROM episodes WHERE id_serie = ?";
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
    <style>
        body {
            background-color: #141414;
            color: white;
            font-family: 'Inter', sans-serif;
        }
        header {
            text-align: center;
            padding: 20px;
        }
        .serie-header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }
        .serie-header img {
            width: 200px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .serie-header h1 {
            font-size: 2.5em;
            margin: 0;
        }
        .serie-header p {
            font-size: 1.2em;
            margin: 10px 0;
            max-width: 800px;
        }
        .season {
            margin: 20px 0;
        }
        .episode-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .episode {
            background-color: #333;
            border-radius: 10px;
            padding: 10px;
            transition: transform 0.3s;
        }
        .episode:hover {
            transform: scale(1.05);
        }
        .episode h3 {
            margin: 0;
            font-size: 1.2em;
        }
        .episode p {
            font-size: 0.9em;
        }
        .reproducir {
            background-color: #e50914;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 20px;
        }
        .reproducir:hover {
            background-color: #f40612;
        }
    </style>
    <script>
        function showNotification(episodeName) {
            alert('Reproduciendo ' + episodeName);
        }
    </script>
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
            <p><?= htmlspecialchars($serie['description']) ?></p>
        </div>
    </header>
    <main>
        <?php foreach ($seasons as $seasonNumber => $seasonEpisodes): ?>
            <div class="season">
                <h2>Temporada <?= $seasonNumber ?></h2>
                <ul class="episode-list">
                    <?php foreach ($seasonEpisodes as $episode): ?>
                        <li class="episode">
                            <h3><?= htmlspecialchars($episode['name']) ?></h3>
                            <p><?= htmlspecialchars($episode['description']) ?></p>
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