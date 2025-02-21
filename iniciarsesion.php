<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta property="og:title" content="Maciflix" />
  <meta name="twitter:title" content="Maciflix" />
  <meta http-equiv="Content-Language" content="es" />
  <meta name="robots" content="noindex" />


  <!--Estilos-->
  <link rel="icon" type="image/x-icon" href="/img/logomaciflix.png" />
  <link rel="stylesheet" href="/css/estandarizar.css" />
  <link rel="stylesheet" href="/css/iniciarsesionyregistrarse.css" />
  <link rel="stylesheet" href="/css/estilospersonalizados.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/animacionboton.css" />
  <link rel="stylesheet" href="/css/footer.css" />
  <title>Maciflix España - Iniciar sesión</title>
</head>

<body>
  <iframe src="/header.php"
    onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
  <div class="flex-container">
    <div class="login">
      <form method="POST" action="">

        <h2 id="title">Iniciar sesión</h2>
        <?php if (isset($error)): ?>
          <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <input type="text" id="email" name="email" placeholder="Email" required />
        <input type="password" id="password" name="password" placeholder="Contraseña" required />
        <button type="submit" id="log_in_button" class="glow_on_hover">

          Iniciar sesión
        </button>
        <script src="/js/iniciarsesion.js"></script>
        <div class="register">
          <h3>No tienes cuenta?</h3>
          <a href="/registrarse.php" id="sign_up_button">
            <button type="button" class="glow_on_hover">Registrarse</button>
          </a>
        </div>
      </form>
    </div>
  </div>
  <iframe src="footer.php"
    onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>

</html>

<?php
include_once("conexion.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];

  if (empty($email) || empty($password)) {
    $error = "Por favor, complete todos los campos.";
  } else {
    $stmt = $bbdd->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();
      if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: /index.php");
        exit();
      } else {
        $error = "Credenciales incorrectas.";
      }
    } else {
      $error = "Usuario no encontrado.";
    }
    $stmt->close();
  }
}
?>