<?php include_once('conexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8">
        <title>Maciflix</title>
        <link rel="stylesheet" href="css/cines.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/footer.css">
    </head>
    <body>
    <!-- Titulo -->
    <iframe src="header.html" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
        <h1>Cines disponibles</h1> 
    <!-- Las peliculas disponibles -->
        <div class="contenedor-de-cines">
            <div class="foto_y_nombre">
                <div class="cine-individual" id="cine1">
                    <div class="fotocine">
                        <a href="/peliculasdisponiblescines.html">
                            <img src="/img/cine1.png" alt="Cine Tampa">
                        </a>
                    </div>
                    <div class="cine_titulo">
                        <div class="cine_titulo_1">Cine Tampa</div>
                    </div>
                </div>
                <div class="informacion_del_cine">
                    <div class="informacion-general">
                        <span><a href="https://maps.app.goo.gl/wFJKjSYA9vf4Er7E7">Direccion: Carrer de l'Olivar, 07001 Palma, Mallorca</a></span><br>
                        <span>Teléfono de contacto: <a href="tel:+6494461709">(+34) 123 456 789</a></span><br>
                        <span>Correo electrónico: <address><a href="mailto:contacto@cinemallorca.com">contacto@cinemallorca.com</a></address><br>
                        <span>Horarios de atención: Lunes a Domingo: 10:00 - 22:00</span><br>
                        <span>Redes Sociales:</span>
                        <ul class="redes-sociales"> 
                            <li><span><a href="https://es-es.facebook.com/">Facebook</a></span></a></li>
                            <li><span><a href="https://es-es.facebook.com/">Instagram</a></span></a></li>
                            <li><span><a href="https://es-es.facebook.com/">Twitter</a></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="foto_y_nombre">
                <div class="cine-individual" id="cine1">
                    <div class="fotocine">
                        <a href="/peliculasdisponiblescines.html">
                            <img src="/img/cine2.png" alt="Cine Cosmo">
                        </a>
                    </div>
                    <div class="cine_titulo">
                        <div class="cine_titulo_1">Cine Cosmo</div>
                    </div>
                </div>
                <div class="informacion_del_cine">
                    <div class="informacion-general">
                        <span><a href="https://maps.app.goo.gl/d91zTn6suQiD1rx56">Direccion: Carrer del Monestir, 5, 07620 Llucmajor, Mallorca</a></span><br>
                        <span>Teléfono de contacto: <a href="tel:+6494461709">(+34) 636 35 52 89</a></span><br>
                        <span>Correo electrónico: <address><a href="mailto:contacto@cinemallorca.com">contacto@cinemallorca.com</a></address><br>
                        <span>Horarios de atención: Lunes a Domingo: 10:00 - 22:00</span><br>
                        <span>Redes Sociales:</span>
                        <ul>
                            <li><span><a href="https://es-es.facebook.com/">Facebook</a></span></a></li>
                            <li><span><a href="https://es-es.facebook.com/">Instagram</a></span></a></li>
                            <li><span><a href="https://es-es.facebook.com/">Twitter</a></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/cines.js"></script>
        <iframe src="footer.html" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    </body>
</html>