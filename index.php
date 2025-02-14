<?php include_once('conexion.php'); ?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="img/logomaciflix.png">
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body id="indexbody">
 
    <iframe
      src="header.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"
    ></iframe>
    <div class="buscador">
      <input type="search" id="busqueda" placeholder="Buscar productos..." />
      <button class="minimal-button" id="buscar">Buscar</button>
    </div>
    <div>
      <div class="contenedorcarrusel">
        <!--Aqui quiero meter el carrusel-->
        <div>
          <h2>Peliculas en nuestro catalogo</h2>
        </div>
        <section>
        <?php 
        $sql = "SELECT * FROM films WHERE home=1";
        $result = $bbdd->query($sql);
          if ($result->num_rows > 0) {
            // hay información que mostrar
            while ($row = $result->fetch_assoc()) {
              echo "<div>
                      <a href='pelicula.php?id=" . $row['id'] . "'>
                        <img src='img/" . htmlspecialchars($row['img']) . "' alt='" . htmlspecialchars($row['name']) . "' />
                      </a>
                    </div>";
            }
          } else {

              echo "Sin información ingresada aún";
          }
          ?>
        </section>
      </div>
    </div>
    <div>
      <div class="contenedorcarrusel">
        <!--Aqui quiero meter el carrusel-->
        <div>
          <h2>Series en nuestro catalogo</h2>
        </div>
        <section>
        <?php 
        $sql = "SELECT * FROM series WHERE home=1";
        $result = $bbdd->query($sql);
          if ($result->num_rows > 0) {
            // hay información que mostrar
            while ($row = $result->fetch_assoc()) {
              echo "<div>
                      <a href='serie1.php?id=" . $row['id'] . "'>
                        <img src='img/" . htmlspecialchars($row['img']) . "' alt='" . htmlspecialchars($row['name']) . "' />
                      </a>
                    </div>";
            }
          } else {

              echo "Sin información ingresada aún";
          }
          ?>
        </section>
      </div>
    </div>
    <div>
      <div class="contenedorcarrusel">
        <!--Aqui quiero meter el carrusel-->
        <div>
          <h2>Cines</h2>
        </div>
        <section>
        <?php 
        $sql = "SELECT * FROM cinemas";
        $result = $bbdd->query($sql);
          if ($result->num_rows > 0) {
            // hay información que mostrar
            while ($row = $result->fetch_assoc()) {
              echo "<div>
                      <a href='peliculasdisponiblescines.php?id=" . $row['id'] . "'>
                        <img src='img/" . htmlspecialchars($row['img']) . "' alt='" . htmlspecialchars($row['name']) . "' />
                      </a>
                    </div>";
            }
          } else {

              echo "Sin información ingresada aún";
          }
          ?>
    </div>
    <br>
    <iframe
      src="footer.php"
      onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"
    ></iframe>
  </body>
</html>
<?php $bbdd->close(); ?>