<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/milista.js"></script>   
    <link rel="stylesheet" href="css/estilosmilista.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <title>MI LISTA</title>  
</head>
<body>

<iframe src="header.php"onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <header>
        <div id="logo">MI LISTA</div>
        <div id="search-bar">
            <input type="text" placeholder="Buscar películas...">
        </div>
    </header>
    <div class="contenido-pelis">
        <div class="peli" onclick="showPopup('Buscando a Nemo')">
            <img src="img/Nemo.png" alt="Buscando a Nemo">
            <h3>Buscando a Nemo</h3>
        </div>
        <div class="peli" onclick="showPopup('Cars 2')">
            <img src="img/Cars_2.png" alt="Cars 2">
            <h3>Cars 2</h3>
        </div>
        <div class="peli" onclick="showPopup('Ice Age 3')">
            <img src="img/ice3.png" alt="Ice Age 3">
            <h3>Ice Age 3</h3>
        </div>
        <div class="peli" onclick="showPopup('Ready Player One')">
            <img src="img/ready.png" alt="Ready Player One">
            <h3>Ready Player One</h3>
        </div>
        <div class="peli" onclick="showPopup('Toy Story 3')">
            <img src="img/Toystory.png" alt="Toy Story 3">
            <h3>Toy Story 3</h3>
        </div>
        <div class="peli" onclick="showPopup('Uncharted')">
            <img src="img/uncharted.png" alt="Uncharted"  width="650px"  height="300">
            <h3>Uncharted</h3>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="cuadro-opciones">
            <div class="opciones">
                <button onclick="location.href='login.html'">ver </button>
                <button onclick="location.href='peliculas.html'">Quitar de mi lista</button>
                <button onclick="hidePopup()">Cerrar</button>
            </div>
           
        </div>
    </div>

    <iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>        
</body>
</html>
