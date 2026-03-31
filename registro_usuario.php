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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="JS/return_to_zero.js"></script>
</head>
<body class="bg-light">
<?php include("fragmentos/nav.php");?>
<div class="card mx-auto" style="max-width: 400px;">
  <div class="card-body">
    <h3 class="text-center">Registro de Usuario</h3>
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
      <button type="submit" name="registrar" class="btn btn-primary w-100">Registrar</button>
    </form>
    <div class="text-center mt-3">
      <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
  </div>
</div>
<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == 'duplicado') {
        echo "<div class='alert alert-danger mt-3 text-center'>El usuario ya existe</div>";
    } else {
        echo "<div class='alert alert-danger mt-3 text-center'>Error al registrar</div>";
    }
}
if (isset($_POST['registrar'])) {
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO cuenta (usuario, password) VALUES ('$usuario', '$password')";
    try {
        $conexion->query($sql);
        header("Location: login.php?registro=ok");
        exit();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            header("Location: registro_usuario.php?error=duplicado");
        } else {
            header("Location: registro_usuario.php?error=general");
        }
        exit();
    }
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>