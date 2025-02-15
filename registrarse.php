<? include_once("/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta property="og:title" content="Maciflix" />
  <meta name="twitter:title" content="Maciflix" />
  <meta http-equiv="Content-Language" content="es" />
  <link rel="icon" type="image/x-icon" href="/img/fondonetflix.jpg" />
  <link rel="stylesheet" href="/css/estandarizar.css" />
  <link rel="stylesheet" href="/css/iniciarsesionyregistrarse.css" />
  <link rel="stylesheet" href="/css/estilospersonalizados.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/footer.css" />
  <link rel="stylesheet" href="/css/animacionboton.css" />
  <title>Maciflix España - Registrarse</title>
</head>

<body>
  <header>
    <iframe src="/header.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
  </header>
  <div class="flex-container">
    <div class="login">
      <form method="post">
        <h2 id="title">Crea tu cuenta</h2>
        <input type="text" class="password" placeholder="Nombre de usuario" />

        <input type="text" id="email" placeholder="Email" required />
        <input type="password" class="password" placeholder="Contraseña" required />
        <input type="password" class="password" placeholder="Confirma Contraseña" required />

        <button type="button" id="sign_up_button" class="glow_on_hover">
          Crear
        </button>
        <script src="/js/crearcuenta.js"></script>
        <div class="register">
          <h3>Ya tienes una cuenta?</h3>
          <a href="/iniciarsesion.php">
            <button type="button" id="register" class="log_in_button glow_on_hover">
              Iniciar sesión
            </button>
          </a>
        </div>
      </form>
    </div>
  </div>
  <footer>
    <iframe src="footer.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
  </footer>
</body>

</html>

<?php 
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$usuario = $_POST["usuario"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

if ($password !== $confirm_password) {
  die("Las contraseñas no coinciden.");
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", var: $usuario, $email, $password_hash);

if ($stmt->execute()) {
echo "Registro exitoso. <a href='iniciarsesion.php'>Inicia sesión aquí</a>";
} else {
  echo "Error al registrar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>