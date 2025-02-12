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
    <iframe
      src="/header.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"
    ></iframe>
    <div class="flex-container">
      <div class="login">
        <form>
          <h2 id="title">Iniciar sesión</h2>
          <input type="text" id="email" placeholder="Email" required />
          <input
            type="password"
            id="password"
            placeholder="Contraseña"
            required
          />
          <button type="button" id="log_in_button" class="glow_on_hover">
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
    <iframe
      src="footer.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"
    ></iframe>
  </body>
</html>
