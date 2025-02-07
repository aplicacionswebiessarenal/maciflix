<?php
$servidor   = 'localhost';
$usuario    = 'root';
$contrasena = '';
$bd = 'maciflix';

// se crea la conexión
$bbdd = new mysqli($servidor, $usuario, $contrasena, $bd);

// se valida la conexión

if ($bbdd->connect_error) {

    die('Hubo un fallo en la conexión ' . $bbdd->connect_error);
};