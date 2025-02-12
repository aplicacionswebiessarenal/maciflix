<!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset=UTF-8>
      <title>Metodos de pago</title>
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
              <div>
                <img class=logopago src="../img/tarjeta.png">
                <input type="text" placeholder="Numero de tarjeta" required>
                <input type="CCV" placeholder="CCv" required>
                <input type="date" placeholder="Fecha de caducidad" required>
                <a href="confirmacionpago.php">
                  <button class="total">Pagar</button>
                </a>
              </div>
          </div>
          <div class="metododepago">
            <h2>Paypal</h2>
              <div> 
                <img id=paypal src="../img/paypal.png">
                <input type="email" placeholder="Correo electrónico" required>
                <input type="password" placeholder="Contraseña" required>
                <a href="confirmacionpago.php">
                  <button class="total">Pagar</button>
                </a>
              </div>
          </div>
          <div class="metododepago">
            <h2>Transferencia bancaria</h2>
              <div>
                <img class=logopago src="../img/tarjetacredito.png">
                <input type="text" placeholder="Nombre y apellidos" required>
                <input type="text" placeholder="Numero de cuenta" required>
                <input type="text" placeholder="Asunto de compra" required>
                <a href="confirmacionpago.php">
                  <button class="total">Pagar</button>
                </a>
              </div>
          </div>
          <div class="metododepago">
            <h2>Bizum</h2>
              <div>
                <img id=bizum src="../img/bizum.png">
                <input type="tel" placeholder="numero de telefono" required>
                  <a href="confirmacionpago.php">
                    <button class="total">Pagar</button>
                  </a>
              </div>
          </div>
        <iframe src="footer.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
      </body>
  </html>