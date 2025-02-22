<?php include_once('conexion.php'); ?>
<!DOCTYPE html>

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet" />
</head>
<header>


  <div class="header">
    <div>
      <a href="index.php">
        <img class="icono" src="img/logomaciflix.png" alt="icono" />
      </a>
      <!--Icono Maciflix-->
    </div>
    <div>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="iniciarsesion.php">
          <button id="iniciosesión" class="minimalbutton">
            Iniciar Sesión
          </button>
        </a>
      <?php endif; ?>

    </div>
  </div>
  </div>
  <nav>
    <button class="miboton" id="miboton" onclick="minav.classList.toggle('show');">
      <i class="fas fa-bars"></i>
      <!--Elemento hamburgesa de la lista-->
    </button>
    <ul id="minav">
      <li>
        <a href="peliculas.php">Peliculas</a>
      </li>
      <li>
        <a href="series.php">Series</a>
      </li>
      <li>
        <a href="cines.php">Cines</a>
      </li>
      <li>
        <a href="tienda.php">Tienda</a>
      </li>
    </ul>
  </nav>
</header>
<?php $bbdd->close(); ?>