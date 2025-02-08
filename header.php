<!DOCTYPE html>
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet"
  />
</head>
<header>
  <body>
  <div class="header">
      <a href="index.html">
        <img class="icono" src="img/logomaciflix.png" alt="icono"/>
      </a>
      <!--Icono Maciflix-->
    </div>
    <div>
      <a href="iniciarsesion.html">
        <button id="iniciosesión" class="minimalbutton">
          Iniciar Sesión
        </button>
      </a>
    </div>
  </div>
  <nav>
    <button class="miboton" id="miboton" onclick="minav.classList.toggle('show');">
      <i class="fas fa-bars"></i>
      <!--Elemento hamburgesa de la lista-->
    </button>
    <ul id="minav">
      <li>
        <a href="peliculas.html">Peliculas</a>
      </li>
      <li>
        <a href="series.html">Series</a>
      </li>
      <li>
        <a href="cines.html">Cines</a>
      </li>
      <li>
        <a href="tienda.html">Tienda</a>
      </li>
    </ul>
  </nav>
</header>
