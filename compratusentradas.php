<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Maciflix - seleción sala</title>
        <link rel="stylesheet" href="/css/compratusentradas.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/footer.css">
        <!-- Enlace al archivo CSS -->
    </head>
    <?php
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "root"; // Cambia esto por tu usuario de la base de datos
$password = ""; // Cambia esto por tu contraseña de la base de datos
$dbname = "maciflix"; // Nombre de tu base de datos

// Crear conexión uwu
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
<?php
include 'conexion.php'; // Incluir el archivo de conexión

// Obtener las salas de cine de la base de datos
$sql = "SELECT id, name FROM sala"; // Asegúrate de que la tabla y columnas sean correctas
$result = $conn->query($sql);
?>

<body> 
<iframe
    src="header.php"
    onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"
    ></iframe>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compra tus Entradas</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 20px;
            }
            .container {
                max-width: 600px;
                margin: auto;
                background: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            select, button {
                padding: 10px;
                margin-top: 10px;
                width: 100%;
            }
        </style>
    <div class="container">
        <h2>Selecciona una Sala de Cine</h2>
        <form action="seleccionar_asiento.php" method="POST">
            <label for="sala">Elige una sala:</label>
            <select name="sala" id="sala" required>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay salas disponibles</option>";
                }
                ?>
            </select>
            <button type="submit">Seleccionar sala</button>
        </form>
    </div>

    <iframe src="footer.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

</body>
</html>

