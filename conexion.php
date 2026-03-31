<?php
    $servidor = "localhost";
    $usuario = "bibliotecario";
    $contrasena = "megustanloslibros";
    $base_datos = "biblioteca";
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    session_start();
?>

