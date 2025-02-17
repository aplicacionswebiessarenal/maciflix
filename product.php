<?php 
include_once('conexion.php'); 

// Verificar si se pasó un ID de producto en la URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Producto no encontrado.");
}

$id = intval($_GET['id']); 

// Obtener los datos del producto desde la base de datos
$sql = "SELECT id, name, description, price, img, stock FROM product WHERE id = ?";
$stmt = $bbdd->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Si no existe el producto, mostrar un mensaje y salir
if (!$product) {
    die("Producto no encontrado.");
}

// Manejo del formulario para añadir al carrito
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = 1;

    // Verificar si el producto ya está en el carrito
    $check_sql = "SELECT id FROM cart WHERE id_product = ?";
    $stmt_check = $bbdd->prepare($check_sql);
    $stmt_check->bind_param("i", $product_id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // Si ya está en el carrito, aumentar cantidad
        $update_sql = "UPDATE cart SET quantity = quantity + 1 WHERE id_product = ?";
        $stmt_update = $bbdd->prepare($update_sql);
        $stmt_update->bind_param("i", $product_id);
        $stmt_update->execute();
        $stmt_update->close();
    } else {
        // Si no está, insertarlo en el carrito
        $insert_sql = "INSERT INTO cart (id_product, quantity) VALUES (?, ?)";
        $stmt_insert = $bbdd->prepare($insert_sql);
        $stmt_insert->bind_param("ii", $product_id, $quantity);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    $stmt_check->close();
    header("Location: product.php?id=$product_id&added=1"); // Redirigir para evitar reenvío de formulario
    exit();
}

$stmt->close();
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maciflix España - <?= htmlspecialchars($product['name']) ?> </title>
    <link rel="icon" type="image/x-icon" href="img/logomaciflix.png">
    <link rel="stylesheet" href="css/animacionboton.css" />
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    
    <iframe src="header.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <div class="producto_detalle">
        <div class="imagen_producto">
            <img src="img/<?= htmlspecialchars($product['img']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
        </div>

        <div class="información_producto">
            <h3 class="nombre_productos"><?= htmlspecialchars($product['name']) ?></h3>
            <p><?= htmlspecialchars($product['description']) ?></p>
            
            <div class="botones">
                <div class="precio_carrito">
                    <p><?= number_format($product['price'], 2) ?>€</p>
                </div>

                <!-- Formulario para añadir al carrito -->
                <div class="boton_añadir_carrito">
                    <form method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <button type="submit" class="glow_on_hover">Añadir al carrito</button>
                    </form>
                </div>

                <div class="boton_ir_carrito">
                    <a href="carrito.php">
                        <button class="glow_on_hover">Ir al carrito</button>
                    </a>
                </div>
            </div>

            <!-- Mensaje de confirmación al añadir al carrito -->
            <?php if (isset($_GET['added']) && $_GET['added'] == 1): ?>
                <p style="color: green;">¡Producto añadido al carrito!</p>
            <?php endif; ?>
        </div>
    </div>

    <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

</body>
</html>
