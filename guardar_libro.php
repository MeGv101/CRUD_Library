<?php
include("conexion.php");

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$fecha = $_POST['fecha'];
$genero = $_POST['genero'];

$sql = "INSERT INTO libro (titulo, autor, fecha, genero)
        VALUES ('$titulo', '$autor', '$fecha', '$genero')";

$conexion->query($sql);
header("Location: listar_libros.php");
exit;
?>
