<?php
  include("conexion.php"); 

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
<body class="bg-light">
    <?php include("fragmentos/nav.php");?> 
    <div class="card mx-auto" style="max-width: 400px;">
      <div class="card-body">
        <h3 class="text-center">Inicio de Sesión</h3>
        <form method="POST">
          <div class="mb-3">
            <label>Nombre de usuario
          <input type="text" name="usuario" class="form-control" autocomplete="off" required >
        </label>
      </div>
      <div class="mb-3">
        <label>Contraseña
          <input type="password" name="password" class="form-control" autocomplete="off" required>
        </label>
          </div>
          <button type="submit" name="login" class="btn btn-success w-100">Ingresar</button>
        </form>
      </div>
    </div>
    <?php 
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
              session_start();
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>








