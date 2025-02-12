<?php include_once('conexion.php')?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maciflix España - Camiseta Maciflix</title>
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
            <img src="img/camiseta_maciflix.png" alt="Camiseta Maciflix">
        </div>

        <div class="información_producto">
            <h3 class="nombre_productos">Camiseta Maciflix</h3>
            <p>Esta es una camiseta muy cómoda de nuestra marca personal Maciflix por ahora solo la vendemos en talla única.</p>
            <p>Estamos preparando muchos más productos de la marca Maciflix para sacarlos a la venta dentro de poco habrá sorpresas al comprar esta camiseta entras en el sorteo de un producto sorpresa de la marca Maciflix.</p>
            
            
            <div class="botones">
                <div class="precio_carrito">
                    <p>20€</p>
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


    <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <script src="/js/botoncarrito.js"></script>
</body>
</html>