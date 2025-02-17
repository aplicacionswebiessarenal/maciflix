<?php
$servidor   = 'localhost';
$usuario    = 'root';
$contrasena = '';
$bd         = 'maciflix';

// Conexión a la base de datos
$bbdd = new mysqli($servidor, $usuario, $contrasena, $bd);

if ($bbdd->connect_error) {
    die('Error en la conexión: ' . $bbdd->connect_error);
}

if (!isset($_GET['lang'])) {
    header("Location: ?lang=1"); // Redirige a la misma página con ?lang=1
    exit();
}
$idioma = (int)$_GET['lang'];

// Obtener las preguntas frecuentes en el idioma seleccionado
$sql = "SELECT question, answer FROM faq WHERE language = ?";
$stmt = $bbdd->prepare($sql);
$stmt->bind_param("i", $idioma);
$stmt->execute();
$resultado = $stmt->get_result();
$preguntas = $resultado->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$bbdd->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosmilista.css">
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/milista.js"></script>   
    <title>Preguntas Frecuentes</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body id="FAQ-body">
<iframe src="header.php"onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

      <h1>PREGUNTAS FRECUENTES</h1>
      
      <form method="GET">
      <label for="lang">Selecciona tu idioma:</label>
      <select name="lang" id="lang" onchange="this.form.submit()">
          <option value="1" <?= ($_GET['lang'] ?? 1) == 1 ? 'selected' : '' ?>>Español</option>
          <option value="2" <?= ($_GET['lang'] ?? 1) == 2 ? 'selected' : '' ?>>English</option>
          <option value="3" <?= ($_GET['lang'] ?? 1) == 3 ? 'selected' : '' ?>>Français</option>
      </select>
      </form>
  <div id="faq">
          <?php foreach ($preguntas as $faq): ?>
              <div class="faq-item">
              <button class="faq-pregunta">
                <?php echo htmlspecialchars($faq['question']); ?>
                <span class="faq-icon">&#9660;</span> <!-- Icono de despliegue -->
            </button>
                  <p class="faq-respuesta"><?php echo htmlspecialchars($faq['answer']); ?></p>
              </div>
          <?php endforeach; ?>
  </div>
    <footer>
        <div class="contenido-c">
            <p>&copy; 2025 MACIFLIX Entertainment, A.W Todos los derechos reservados.</p>
        </div>
      </footer>
        <script>
            document.querySelectorAll('.faq-pregunta').forEach(button => {
                button.addEventListener('click', () => {
                    let respuesta = button.nextElementSibling;

                    if (respuesta.style.display === 'block') {
                        respuesta.style.display = 'none';
                    } else {
                        // Primero ocultamos todas las respuestas antes de abrir una nueva
                        document.querySelectorAll('.faq-respuesta').forEach(resp => {
                            resp.style.display = 'none';
                        });

                        respuesta.style.display = 'block';
                    }
                });
            });
         </script>
</body>
</html>
