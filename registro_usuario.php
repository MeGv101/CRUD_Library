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
        <h2 class="titulo">Registro</h2>
        <p class="subtitulo">Crea tu cuenta en la biblioteca</p>

        <form method="POST">

            <div class="input-group">
                <span class="input-group-text">👤</span>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required autocomplete="off">
            </div>

            <div class="input-group">
                <span class="input-group-text">🔒</span>
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required autocomplete="off">
            </div>

            <button type="submit" name="registrar" class="btn btn-primary w-100">
                Registrarse
            </button>

        </form>

        <div class="text-center">
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
    $password = $_POST['password'];

    $sql = "INSERT INTO cuenta (usuario, password) VALUES ('$usuario', SHA2('$password', 256))";

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>