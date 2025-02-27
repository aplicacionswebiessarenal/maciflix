<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maciflix";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Eliminar película si se recibe el ID
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM mi_lista WHERE id = $id";
    $conn->query($sql);
    exit;
}
if (isset($_POST['nombre']) && isset($_POST['imagen'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $imagen = $conn->real_escape_string($_POST['imagen']);
    $sql = "INSERT INTO mi_lista (nombre, imagen) VALUES ('$nombre', '$imagen')";
    $conn->query($sql);
}

// Obtener la lista de películas

$sql = "SELECT * FROM mi_lista";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/milista.js"></script>   
    <link rel="stylesheet" href="css/estilosmilista.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Mi Lista - Maciflix</title>

</head>
<body id="body-milista">

<iframe src="header.php"onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <h1>Mi Lista</h1>
    <div id="lista">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="pelicula" id="pelicula-<?php echo $row['id']; ?>">
                <img src="img/<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>">
                <h1 class="nombre"><?php echo $row['nombre']; ?></h1>
                    <button class="boton ver" onclick="verPelicula('<?php echo $row['nombre']; ?>')">Ver</button>
                    <button class="boton quitar" onclick="quitarPelicula(<?php echo $row['id']; ?>)">Quitar</button>
                </div>
            <?php } ?>
    </div>
    
    <script>
        function verPelicula(nombre) {
            alert('Reproduciendo ' + nombre);
        }
        
        function quitarPelicula(id) {
            if (confirm('¿Seguro que quieres quitar esta película?')) {
                fetch('', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'delete=true&id=' + id
                }).then(() => {
                    document.getElementById('pelicula-' + id).remove();
                });
            }
        }
    </script>

    <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>        
</body>
</html>

<?php $conn->close(); ?>
