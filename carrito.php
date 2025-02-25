<?php
include_once('conexion.php'); // Conexión a la base de datos

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session
}


// Eliminar producto si se recibe una solicitud POST

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id'])) {
    $cart_id = (int) $_POST['cart_id']; // Asegurar que sea un número entero

    // Eliminar producto del carrito
    $sql_delete = "DELETE FROM cart WHERE id = ?";
    $stmt = $bbdd->prepare($sql_delete);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; // Buscar sesión PHP
}

// Obtener los productos del carrito con un JOIN para mejorar rendimiento

$sql = "SELECT p.id, p.name, p.price, p.img, c.quantity, c.id as cart_id
        FROM cart c 
        JOIN product p ON c.id_product = p.id
WHERE c.id IN (" . (empty($_SESSION['cart']) ? 'NULL' : implode(',', $_SESSION['cart'])) . ")"; // Pillar datos de la base de datos


$result = $bbdd->query($sql);

$productos = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row; // Agregar producto con cantidad incluida
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Maciflix España - Carrito de la compra</title>
    <link rel="icon" type="image/x-icon" href="img/logomaciflix.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <iframe src="header.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</head>

<body>
    <h2>Productos seleccionados</h2>
    <div class="carrito" id="carrito">
        <div id="carritoproducto">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="producto">
                        <img src="img/<?php echo htmlspecialchars($producto['img']); ?>"
                            alt="<?php echo htmlspecialchars($producto['name']); ?>">
                        <div class="info">
                            <h3><?php echo htmlspecialchars($producto['name']); ?></h3>
                            <p>Precio: $<?php echo number_format($producto['price'], 2); ?></p>
                            <p>Cantidad: <?php echo (int) $producto['quantity']; ?></p>
                            <p>Subtotal: $<?php echo number_format($producto['price'] * $producto['quantity'], 2); ?></p>
                            <form action="" method="POST" style="display:inline;">
                                <input type="hidden" name="cart_id" value="<?php echo $producto['cart_id']; ?>">
                                <button type="submit" class="eliminar">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tu carrito está vacío.</p>
            <?php endif; ?>
        </div>
        <div class="total">
            Total: $<span id="total">
                <?php
                $total = 0;
                foreach ($productos as $producto) {
                    $total += $producto['price'] * $producto['quantity'];
                }
                echo number_format($total, 2);
                ?>
            </span>
        </div>
    </div>
    <div class="centradito">
        <a href="metododepago.php">
            <button class="total">Confirmar transacción</button>
        </a>
    </div>

    <iframe src="footer.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>

</html>