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
$username = "tu_usuario"; // Cambia esto por tu usuario de la base de datos
$password = "tu_contraseña"; // Cambia esto por tu contraseña de la base de datos
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
$sql = "SELECT id, nombre FROM salas"; // Asegúrate de que la tabla y columnas sean correctas
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
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
</head>
<body>

<div class="container">
    <h2>Selecciona una Sala de Cine</h2>
    <form action="seleccionar_asiento.php" method="POST">
        <label for="sala">Elige una sala:</label>
        <select name="sala" id="sala" required>
            <option value="">Selecciona una sala</option>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay salas disponibles</option>";
            }
            ?>
        </select>
        <button type="submit">Seleccionar Asiento</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close(); // Cerrar la conexión
?>
<?php
include 'conexion.php'; // Incluir el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sala_id = $_POST['sala'];

    // Aquí deberías obtener los asientos disponibles de la base de datos
    // Por simplicidad, vamos a simularlo con un array
    $asientos = ['A1', 'A2', 'A3', 'B1', 'B2', 'B3']; // Cambia esto por una consulta a la base de datos

    // Puedes agregar lógica para obtener asientos ocupados desde la base de datos
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Asiento</title>
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
            border-radius



    <iframe src="footer.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <script src="/js/java.js"></script>
