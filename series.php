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
    <style>
        body {
            background-color: #141414;
            color: white;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            text-align: center;
            padding: 20px;
            background-color: #1f1f1f;
            border-bottom: 1px solid #333;
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .series-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .serie {
            margin: 10px;
            text-align: center;
            transition: transform 0.3s;
            background-color: #333;
            border-radius: 10px;
            padding: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .serie img {
            width: 100%;
            height: 400px; /* Set a fixed height for all images */
            object-fit: cover; /* Ensure images cover the area */
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .serie:hover {
            transform: scale(1.05); /* Efecto de zoom al pasar el mouse */
        }
        .serie a {
            text-decoration: none;
            color: white;
            display: block;
            margin-top: 10px;
            font-size: 1.2em;
        }
        .boton {
            background-color: #e50914;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        .boton:hover {
            background-color: #f40612;
        }
        .description {
            display: none;
            margin-top: 10px;
            text-align: left;
            background-color: #444;
            padding: 10px;
            border-radius: 5px;
        }
        footer {
            background-color: #1f1f1f;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #333;
        }
    </style>
    <script>
        function toggleDescription(id) {
            const desc = document.getElementById('desc-' + id);
            desc.style.display = desc.style.display === 'block' ? 'none' : 'block';
        }
    </script>
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
                    <div class="description" id="desc-<?= htmlspecialchars($row['id']) ?>">
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