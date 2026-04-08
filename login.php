<?php
  include("conexion.php");

  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }

  header("Cache-Control: no-cache, no-store, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: 0");

  if (isset($_SESSION['usuario'])) {
      header("Location: listar_libros.php");
      exit;
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biblioteca Virtual</title>
  <link rel="stylesheet" href="CSS/login.css">
  <link rel="stylesheet" href="CSS/nav.css">
  <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/morph/bootstrap.min.css" rel="stylesheet">
  <script src="JS/return_to_zero.js"></script>
</head>
<body>

  <?php include("fragmentos/nav.php");?> 

  <div class="contenedor-login">
    <div class="card-login">
      <h2 class="titulo">Inicio de Sesión</h2>
      <p class="subtitulo">Accede a tu biblioteca virtual</p>

      <form method="POST">

        <div class="input-group">
          <span class="input-group-text">👤</span>
          <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
        </div>

        <div class="input-group">
          <span class="input-group-text">🔒</span>
          <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
        </div>

        <button type="submit" name="login" class="btn btn-primary w-100">
          Ingresar
        </button>

      </form>

      <div class="text-center">
        <a href="registro_usuario.php">¿No tienes cuenta? Regístrate</a>
      </div>
    </div>
  </div>
  <?php 
  // 🔔 MENSAJES
  if (isset($_GET['registro']) && $_GET['registro'] == 'ok') {
      echo "<div class='alert alert-success mt-3 text-center'>Usuario registrado correctamente</div>";
  }
  if (isset($_GET['error']) && $_GET['error'] == 'credenciales') {
      echo "<div class='alert alert-danger mt-3 text-center'>ERROR: Credenciales incorrectas o inexistentes.</div>";
  }
  if (isset($_GET['error']) && $_GET['error'] == 'no_access') {
      echo "<div class='alert alert-danger mt-3 text-center'>ERROR: Primero debes iniciar sesión</div>";
  }
  ?>

  <?php
  // 🔐 LOGIN FUNCIONAL
  if (isset($_POST['login'])) {
      $usuario = $_POST['usuario'];
      $password = $_POST['password'];

      $query = $conexion->query("
          SELECT * FROM cuenta 
          WHERE usuario='$usuario' 
          AND password = SHA2('$password', 256)
      ");

      $row = $query->fetch_assoc();

      if ($row) {
          $_SESSION['usuario'] = $usuario;
          $_SESSION['rol_id'] = $row['rol_id'];

          header("Location: listar_libros.php");
          exit;
      } else {
          header("Location: login.php?error=credenciales");
          exit;
      }
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>








