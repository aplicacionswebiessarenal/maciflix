<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maciflix - Selección de Sala</title>
    <link rel="stylesheet" href="/css/compratusentradas.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #141414; /* Fondo oscuro */
            color: white; /* Texto blanco */
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #1c1c1c;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            text-align: center;
        }
        h1 {
            color: #e50914;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
        select, button {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        select {
            background-color: #333;
            color: white;
        }
        button {
            background-color: #e50914;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #c40000; /* Rojo más oscuro al pasar el mouse */
        }
        
        
        
    </style>
</head>
<body>
    <iframe src="header.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    <div class="container">
        <h1>Compra tus Entradas</h1>
        <form action="seleccion_asientos.php" method="POST">
            <label for="sala">Elige una sala:</label>
            <select name="sala" id="sala" required>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "maciflix";

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
            <button type="submit">Seleccionar sala</button>
        </form>
    </div>
    <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>
</html>

=======
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

>>>>>>> bad8819ace5771dd5e0995180e6aa44ff1d3d4a8
