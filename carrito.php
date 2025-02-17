<?php 
include_once('conexion.php'); // Conexión a la base de datos

// Obtener los productos del carrito
$sql_cart = "SELECT product_id, quantity FROM cart";
$result_cart = $bbdd->query($sql_cart);

$productos = []; // Array para almacenar los productos

if ($result_cart->num_rows > 0) {
    while ($row_cart = $result_cart->fetch_assoc()) {
        $product_id = $row_cart['product_id'];
        $quantity = $row_cart['quantity'];

        // Obtener detalles del producto
        $sql_product = "SELECT name, price, img FROM product WHERE id = ?";
        $stmt_product = $bbdd->prepare($sql_product);
        $stmt_product->bind_param("i", $product_id);
        $stmt_product->execute();
        $result_product = $stmt_product->get_result();

        if ($result_product->num_rows > 0) {
            $row_product = $result_product->fetch_assoc();
            $row_product['quantity'] = $quantity; // Añadir cantidad al producto
            $productos[] = $row_product; // Agregar producto al array
        }
    }
}
?>

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
      <iframe src="footer.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </body>
  </html>