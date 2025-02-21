<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maciflix - Selección de Sala</title>
    <link rel="stylesheet" href="css/compratusentradas.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <iframe src="header.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    <div class="container">
        <h1>Compra tus Entradas</h1>
        <?php
        $cine_id = isset($_GET['idcine']) ? intval($_GET['idcine']) : 0;
        $peli_id = isset($_GET['idpeli']) ? intval($_GET['idpeli']) : 0;

        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "maciflix";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Obtener el nombre del cine
        $sql_cine = "SELECT name FROM cinemas WHERE id = $cine_id";
        $result_cine = $conn->query($sql_cine);
        $cine_name = $result_cine->num_rows > 0 ? $result_cine->fetch_assoc()['name'] : 'Cine no encontrado';

        // Obtener el nombre de la película
        $sql_peli = "SELECT name FROM films WHERE id = $peli_id";
        $result_peli = $conn->query($sql_peli);
        $peli_name = $result_peli->num_rows > 0 ? $result_peli->fetch_assoc()['name'] : 'Película no encontrada';

        $conn->close();
        ?>
        <div class="info">
            <p><strong>Cine seleccionado:</strong> <?php echo htmlspecialchars($cine_name); ?></p>
            <p><strong>Película seleccionada:</strong> <?php echo htmlspecialchars($peli_name); ?></p>
        </div>
        <form action="seleccion_asientos.php" method="POST">
            <input type="hidden" name="idcine" value="<?php echo $cine_id; ?>">
            <input type="hidden" name="idpeli" value="<?php echo $peli_id; ?>">
            <label for="sala">Elige una sala:</label>
            <div class="select-container">
                <select name="sala" id="sala" required>
                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    $sql = "SELECT id, name FROM sala";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay salas disponibles</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <button type="submit">Seleccionar sala</button>
        </form>
    </div>
    <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>
</html>

