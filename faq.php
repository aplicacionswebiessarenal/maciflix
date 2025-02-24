<?php
include_once('conexion.php'); 

// Si 'lang' no está definido o está vacío, redirigir a español (1)
if (!isset($_GET['lang']) || empty($_GET['lang'])) {
    header("Location: ?lang=1");
    exit();
}

// Definir el idioma seleccionado
$idioma = isset($_GET['lang']) ? (int)$_GET['lang'] : 1;

// Obtener las preguntas frecuentes en el idioma seleccionado
$sql = "SELECT question, answer FROM faq WHERE language = ?";
$stmt = $bbdd->prepare($sql);
$stmt->bind_param("i", $idioma);
$stmt->execute();
$resultado = $stmt->get_result();
$preguntas = $resultado->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$bbdd->close();
// Traducciones de textos estáticos
$textos = [
    1 => [
        'titulo' => 'Preguntas Frecuentes',
        'selecciona' => 'Selecciona tu idioma:',
        'footer' => '&copy; 2025 MACIFLIX Entertainment, A.W Todos los derechos reservados.'
    ],
    2 => [
        'titulo' => 'Frequently Asked Questions',
        'selecciona' => 'Select your language:',
        'footer' => '&copy; 2025 MACIFLIX Entertainment, A.W All Rights Reserved.'
    ],
    3 => [
        'titulo' => 'Questions Fréquentes',
        'selecciona' => 'Sélectionnez votre langue :',
        'footer' => '&copy; 2025 MACIFLIX Entertainment, A.W Tous droits réservés.'
    ]
];
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
 
<iframe class="iframe" src="header.php"onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

<h1><?php echo $textos[$idioma]['titulo']; ?></h1>

      <form method="GET">
      <label for="lang"><?php echo $textos[$idioma]['selecciona']; ?></label>
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
                <span class="faq-icon">&#9660;</span> 
            </button>
                  <p class="faq-respuesta"><?php echo htmlspecialchars($faq['answer']); ?></p>
              </div>
          <?php endforeach; ?>
  </div>
    <footer>
        <div class="contenido-c">
            <p><?php echo $textos[$idioma]['footer']; ?></p>
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
