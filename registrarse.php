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
      <form action="registrarse.php" method="POST">
        <h2 id="title">Crea tu cuenta</h2>
        <form action="process.php" method="POST">
          <input type="text" name="username" class="password" placeholder="Nombre de usuario" required />

          <input type="email" name="email" id="email" placeholder="Email" required />
          <input type="password" name="password" class="password" placeholder="Contraseña" required />
          <input type="password" name="confirm_password" class="password" placeholder="Confirma Contraseña" required />
          <input type="text" name="payment_method" class="password" placeholder="Numero de tarjeta" />
          <input type="text" name="address" class="password" placeholder="Dirección" />
          <input type="text" name="first_name" class="password" placeholder="Nombre" required />
          <input type="text" name="last_name1" class="password" placeholder="Apellido 1" required />
          <input type="text" name="last_name2" class="password" placeholder="Apellido 2" required />
          <button type="submit">Enviar</button>
        </form>
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

include_once("conexion.php");

$conn = $bbdd;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = htmlspecialchars($_POST['username']);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];
  $confirm_pass = $_POST['confirm_password'];
  $address = htmlspecialchars($_POST['address']);
  $card_number = htmlspecialchars($_POST['payment_method']);
  $first_name = htmlspecialchars($_POST['first_name']);
  $last_name1 = htmlspecialchars($_POST['last_name1']);
  $last_name2 = htmlspecialchars($_POST['last_name2']);


  if (empty($username) || empty($email) || empty($password) || empty($confirm_pass) || empty($first_name) || empty($last_name1) || empty($last_name2) || $password != $confirm_pass) {
    die("Error: Todos los campos obligatorios deben ser completados.");
  } else {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, address, payment_method,name, surname1, surname2) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $username, $email, $hashed_password, $address, $card_number, $first_name, $last_name1, $last_name2);
    $stmt->close();
  }
}
?>