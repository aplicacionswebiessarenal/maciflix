<? include_once("/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Película</title>
    <link rel="stylesheet" href="css/pelicula.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>     
<body>

    <iframe src="header.html" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>

    <div class="movie-details-container">
        <h1 id="movie-title"></h1> Toy Story 3
    </div>
    <div class="Resumen-pelicula">
        <p>Toy Story 3 es una película animada de 2010 producida por Pixar Animation Studios y distribuida por Walt Disney Pictures. La historia sigue a Woody, Buzz Lightyear y el resto de los juguetes de Andy cuando enfrentan un nuevo desafío: su dueño está por irse a la universidad, dejando su destino incierto. Por error, los juguetes terminan donados a una guardería llamada Sunnyside, donde al principio parecen haber encontrado un paraíso, pero pronto descubren que no todo es lo que parece. Liderados por Woody, intentan escapar mientras enfrentan temas como la amistad, el abandono y la lealtad. La película combina emoción, humor y aventuras, consolidándose como un clásico moderno. </p>
    </div>
    <div class="Options">
        <button onclick="addToList()">Añadir a mi lista</button>
        <button onclick="goToCinema()">Ir al cine</button>
    </div>
    <iframe src="footer.html" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>