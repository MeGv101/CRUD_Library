<?php
include("conexion.php");

$id = $_GET['id'];
$conexion->query("DELETE FROM libro WHERE id=$id");

header("Location: listar_libros.php");
exit;
?>
