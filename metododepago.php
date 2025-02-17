<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset=UTF-8>
  <title>Maciflix España - Metodos de pago</title>
  <link rel="icon" type="image/x-icon" href="img/logomaciflix.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
  <link rel=stylesheet href=css/carrito.css>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/footer.css">
  <iframe src="header.php"
  onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</head>
<body>
  <div class="metododepago">
    <h2>Tarjeta de credito</h2>
    <form action="confirmacionpago.php" method="POST">
      <div>
        <img class=logopago src="../img/tarjeta.png">
        <input type="text" name="numero_tarjeta" placeholder="Numero de tarjeta" required>
        <input type="text" name="ccv" placeholder="CCV" required>
        <input type="date" name="fecha_caducidad" placeholder="Fecha de caducidad" required>
        <input type="hidden" name="metodo_pago" value="tarjeta">
        <button type="submit" class="botoncito">Pagar</button>
      </div>
    </form>
  </div>
  <div class="metododepago">
    <h2>Paypal</h2>
    <form action="confirmacionpago.php" method="POST">
      <div>
        <img id=paypal src="../img/paypal.png">
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <input type="hidden" name="metodo_pago" value="paypal">
        <button type="submit" class="botoncito">Pagar</button>
      </div>
    </form>
  </div>
  <div class="metododepago">
    <h2>Transferencia bancaria</h2>
    <form action="confirmacionpago.php" method="POST">
      <div>
        <img class=logopago src="../img/tarjetacredito.png">
        <input type="text" name="nombre" placeholder="Nombre y apellidos" required>
        <input type="text" name="numero_cuenta" placeholder="Numero de cuenta" required>
        <input type="text" name="asunto_compra" placeholder="Asunto de compra" required>
        <input type="hidden" name="metodo_pago" value="transferencia">
        <button type="submit" class="botoncito">Pagar</button>
      </div>
    </form>
  </div>
  <div class="metododepago">
    <h2>Bizum</h2>
    <form action="confirmacionpago.php" method="POST">
      <div>
        <img id=bizum src="../img/bizum.png">
        <input type="tel" name="telefono" placeholder="numero de telefono" required>
        <input type="hidden" name="metodo_pago" value="bizum">
        <button type="submit" class="botoncito">Pagar</button>
      </div>
    </form>
  </div>
  <iframe src="footer.php"
  onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>
</html>