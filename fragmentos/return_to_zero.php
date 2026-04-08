<?php
  include("conexion.php"); 

  header("Cache-Control: no-cache, no-store, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: 0");

  if (!isset($_SESSION['usuario'])) {
      header("Location: login.php?error=no_access");
      exit;
  }
?>