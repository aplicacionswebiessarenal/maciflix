<?php
include_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = 1;

    $pedido_id = 1;

    // Assuming the user ID is stored in the session
    $id_user = $_SESSION['user_id']; // Make sure this is set when the user logs in

    $check_sql = "SELECT id FROM cart WHERE id_product = ? AND id_user = ?";
    $stmt_check = $bbdd->prepare($check_sql);
    $stmt_check->bind_param("ii", $product_id, $id_user);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $update_sql = "UPDATE cart SET quantity = quantity + 1 WHERE id_product = ? AND id_user = ?";
        $stmt_update = $bbdd->prepare($update_sql);
        $stmt_update->bind_param("ii", $product_id, $id_user);
        $stmt_update->execute();
        $stmt_update->close();
    } else {
        $insert_sql = "INSERT INTO cart (id_pedido, id_product, quantity, id_user) VALUES (?, ?, ?, ?)";
        $stmt_insert = $bbdd->prepare($insert_sql);
        $stmt_insert->bind_param("iiii", $pedido_id, $product_id, $quantity, $id_user);
        $stmt_insert->execute();
        $stmt_insert->close();
    }

    $stmt_check->close();
}

$sql = "SELECT id, name, description, price, img, stock FROM product";
$result = $bbdd->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maciflix España - Tienda</title>
    <link rel="icon" type="image/x-icon" href="img/logomaciflix.png">
    <link rel="stylesheet" href="css/animacionboton.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tienda.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" />
</head>

<body>

    <iframe src="header.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <div class="productos_container">
        <?php while ($product = $result->fetch_assoc()): ?>
            <div class="producto_container">
                <div class="producto">
                    <h3 class="nombre_productos"><?= htmlspecialchars($product['name']) ?></h3>

                    <a href="product.php?id=<?= $product['id'] ?>">
                        <img src="img/<?= htmlspecialchars($product['img']) ?>"
                            alt="<?= htmlspecialchars($product['name']) ?>">
                    </a>

                    <p><?= htmlspecialchars($product['description']) ?></p>

                    <div class="botones">
                        <div class="precio_carrito">
                            <p><?= number_format($product['price'], 2) ?>€</p>
                        </div>

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
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <iframe src="footer.php"
        onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

</body>

</html>