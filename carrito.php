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
    <meta charset="UTF-8">
    <title>Carrito de la compra</title>
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Carrito</h1>
    <div class="carrito">
        <?php if (count($productos) > 0): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="producto">
                    <img src="<?= htmlspecialchars($producto['img']) ?>" alt="<?= htmlspecialchars($producto['name']) ?>">
                    <h3 class="nombre_productos"><?= htmlspecialchars($producto['name']) ?></h3>
                    <p>Precio: <?= number_format($producto['price'], 2) ?>€</p>
                    <p>Cantidad: <?= $producto['quantity'] ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos en el carrito.</p>
        <?php endif; ?>
    </div>
    <div class="total">
        <p>Total: 
            <?php 
            $total = 0;
            foreach ($productos as $producto) {
                $total += $producto['price'] * $producto['quantity'];
            }
            echo number_format($total, 2) . '€';
            ?>
        </p>
    </div>
    <div>
        <a href="metododepago.php">
            <button class="total">Confirmar transacción</button>
        </a>
    </div>
</body>
</html>

<?php 
// Cerrar la conexión
$bbdd->close(); 
?>