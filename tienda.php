<?php include_once('conexion.php'); 

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
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"rel="stylesheet"/>
    </head>
    <body>

    <iframe src="header.php"onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <div class="productos_container">
        <?php while ($product = $result->fetch_assoc()): ?>
            <div class="producto_container">
                <div class="producto">
                <h3 class="nombre_productos"><?= htmlspecialchars($product['name']) ?></h3>

                <a href="product.php?id=<?= $product['id'] ?>">
                    <img src="<?= htmlspecialchars($product['img'])?>" alt="<?= htmlspecialchars($product['name']) ?>" />
                </a>

                <p><?= htmlspecialchars($product['description']) ?></p>
                
                <div class="botones">
                    <div class="precio_carrito">
                    <p><?= number_format($product['price'], 2) ?>€</p>
                    </div>

                    <div class="boton_añadir_carrito">
                    <button class="glow_on_hover add-to-cart" 
                            data-id="1" 
                            data-name="Camiseta Maciflix"
                            data-price="20.00"
                            data-image="img/camiseta_maciflix.png">
                        Añadir al carrito
                    </button>
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

    <iframe
    src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    </body>
</html>
