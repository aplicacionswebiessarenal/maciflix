<!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset=UTF-8>
      <title>Carrito de la compra</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
      <link rel=stylesheet href=css/carrito.css>
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/footer.css">
      <iframe src="header.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </head>
    <?php
        $servidor   = 'localhost';
        $usuario    = 'root';
        $contrasena = '';
        $bd = 'maciflix';

        // se crea la conexión
        $bbdd = new mysqli($servidor, $usuario, $contrasena, $bd);

        // se valida la conexión

        if ($bbdd->connect_error) {

            die('Hubo un fallo en la conexión ' . $bbdd->connect_error);
        };
    ?>
    <body>
      <h1>Carrito</h1>
        <div class="producto">
          <span>Camiseta</span>
          <span>$10.00</span>
          <button onclick="addToCart('Camiseta', 10)">Añadir al carrito</button>
        </div>
        <div class="producto">
          <span>Manta</span>
          <span>$15.00</span>
          <button onclick="addToCart('Manta', 15)">Añadir al carrito</button>
        </div>
        <div class="producto">
          <span>Peluche</span>
          <span>$20.00</span>
          <button onclick="addToCart('Peluche', 20)">Añadir al carrito</button>
        </div>
        <h2>Productos seleccionados</h2>
        <div class="carrito" id="carrito">
            <div id="carritoproducto"></div>
            <div class="total">Total: $<span id="total">0.00</span></div>
        </div>
        <div>
          <a href="metododepago.php">
            <button class="total">Confirmar transacion</button>
          </a>
        </div>
        <script>
          const cartItems = [];
          const cartContainer = document.getElementById('carritoproducto');
          const totalContainer = document.getElementById('total');
          
          function addToCart(productName, price) {
            // Añade el producto al carrito
            cartItems.push({ name: productName, price: price });
            
            // Hace que se vea lo que añades 
            updateCart();
          }
          
          function updateCart() {
            // Hace que cuando pulses en un objeto no coja tambien el que has escogido previamente 
            cartContainer.innerHTML = '';
            
            // Actualiza los elementos del carrito
            let total = 0;
            cartItems.forEach((item, index) => {
              total += item.price;
              const cartItem = document.createElement('div');
              cartItem.classList.add('cart-item');
              cartItem.innerHTML = `
                <span>${item.name}</span>
                <span>$${item.price.toFixed(2)}</span>
                <button onclick="removeFromCart(${index})">Eliminar</button>
              `;
              cartContainer.appendChild(cartItem);
            });
            // Actualiza el total
            totalContainer.textContent = total.toFixed(2);
          }
          
          function removeFromCart(index) {
            // Elimina el producto
            cartItems.splice(index, 1);
            
            // Actualizar el carrito visualmente
            updateCart();
          }
        </script>
        <script src="js/botoncarrito.js"></script>
      <iframe src="footer.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </body>
  </html>