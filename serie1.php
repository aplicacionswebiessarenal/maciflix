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
    <style>
        body {
            background-color: #141414;
            color: white;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        .serie-header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }
        .serie-header img {
            width: 300px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .serie-header h1 {
            font-size: 3em;
            margin: 0;
        }
        .serie-header p {
            font-size: 1.2em;
            margin: 10px 0;
            max-width: 800px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            padding: 10px;
        }
        .season {
            margin: 20px;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .episode:hover {
            transform: scale(1.05);
        }
        .episode img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .episode h3 {
            margin: 0;
            font-size: 1.2em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            padding: 10px;
        }
        .episode p {
            font-size: 0.9em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            padding: 10px;
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
        .leer-mas {
            background-color: transparent;
            color: #e50914;
            border: none;
            cursor: pointer;
            font-size: 0.9em;
            margin-top: 10px;
        }
        .season-selector {
            margin: 20px 0;
            text-align: center;
        }
        .season-selector select {
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #e50914;
            background-color: #141414;
            color: white;
        }
    </style>
    <script>
        function showNotification(episodeName) {
            alert('Reproduciendo ' + episodeName);
        }

        function toggleDescription(id) {
            const desc = document.getElementById('desc-' + id);
            const btn = document.getElementById('btn-' + id);
            if (desc.style.whiteSpace === 'nowrap') {
                desc.style.whiteSpace = 'normal';
                btn.innerText = 'Leer menos';
            } else {
                desc.style.whiteSpace = 'nowrap';
                btn.innerText = 'Leer más';
            }
        }

        function showSeason(seasonNumber) {
            const seasons = document.querySelectorAll('.season');
            seasons.forEach(season => {
                season.style.display = 'none';
            });
            document.getElementById('season-' + seasonNumber).style.display = 'block';
        }

        document.addEventListener('DOMContentLoaded', function() {
            showSeason(1); // Show season 1 by default
        });
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