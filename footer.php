<!DOCTYPE html>
<head><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilosmilista.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <footer id="footer">
            <div class="contenido-footer">
                <div class="footer-row">
                    <div class="footer-links">
                        <h3>NUESTROS</h3>
                        <ul>
                            <li>
                                <a href="terms.php"> TERMS & CONDITONS</a>
                            </li>
                            <li>
                                <a href="avisolegal.php"> AVISO LEGAL</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-links">
                        <h3>AYUDA</h3>
                        <ul>
                            <li>
                            <a href="FAQ.php?lang=" + selectedLang>FAQ</a>
                            </li>
                            <li>
                                <a href="FAQ.php"> POLITICA DE PRIVACIDAD</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-links">
                        <h3>TIENDAS</h3>
                        <ul>
                            <li>
                                <a href="tienda.php"> ROPAS MACIFLIX</a>
                            </li>
                            <li>
                                <a href="cines.php"> CINE</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-links">
                        <h3>SIGUENOS</h3>
                        <div class="social-link">
                            <li>
                                <img src="img/facebook.png" width="10%" height="15%">
                            </li>
                            <li>
                                <img src="img/instagram.png" width="10%" height="10%">
                            </li>
                            <li>
                                <img src="img/twitter.png" width="10%" height="10%">
                            </li>
                        </div>
                    </div>
                    <div class="footer-links">
                        <h3>INFO</h3>
                        <div class="social-link">
                            <li class="naruto"> 
                                <img src="img/botondeinformacion.png" width="10%" height="15%">
                            </li>
                            <li>
                                <p>Lideres en estrenos</p>
                                <p>Lo mejor en series</p>
                                <p>Las mejores salas</p>
                            </li>
                        </div>
                    </div>
                    <div class="footer-links">
                        <h3>CONTACTO</h3>
                        <div class="social-link">
                            <li class="naruto">
                                <img src="img/mail.png" width="10%" height="15%">
                            </li>
                            <li> 
                                <p>Maciflix@yopmail.com</p>
                                <p>+34971454846</p>
                            </li>
                        </div>
                    </div>
                </div>
    </footer>     
</body>
<script>
// Capturar el cambio de idioma
document.getElementById("language-selector").addEventListener("change", function() {
    var selectedLang = this.value; // Obtener el idioma seleccionado
    
    // Guardar en una variable
    var idiomaSeleccionado = selectedLang;

    console.log(idiomaSeleccionado); // Puedes ver el valor en la consola si lo necesitas
});
</script>