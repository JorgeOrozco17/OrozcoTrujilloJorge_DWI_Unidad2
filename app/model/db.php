<?php
// Parámetros de conexión
$servidor = "db";
$usuario = "root";
$contrasena = "root";
$basededatos = "cursos";

// Crear conexión
$mysqli = new mysqli($servidor, $usuario, $contrasena, $basededatos);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

// Puedes usar $mysqli en el resto de tu app para consultas/preparados
?>
