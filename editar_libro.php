<?php
  include("fragmentos/return_to_zero.php"); 

  if ($_SESSION['rol_id'] == 1) {
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
      <?php
      $id = $_GET['id'];
      $resultado = $conexion->query("SELECT * FROM libro WHERE id=$id");
      $libro = $resultado->fetch_assoc();

      if (isset($_POST['actualizar'])) {
          $titulo = $_POST['titulo'];
          $autor = $_POST['autor'];
          $fecha = $_POST['fecha'];
          $genero = $_POST['genero'];

          $conexion->query("UPDATE libro SET titulo='$titulo', autor='$autor', fecha='$fecha', genero='$genero' WHERE id=$id");
          header("Location: listar_libros.php");
          exit;
      }
      ?>
<h2>Editar bibliografía del libro</h2>
  <form method="POST" class="card p-4">
      <div class="mb-3">
        <label>Título 
          <input type="text" name="titulo" class="form-control" value="<?= $libro['titulo'] ?>" autocomplete="off" required>
        </label>
      </div>
      <div class="mb-3">
        <label>Autor
          <input type="text" name="autor" class="form-control" value="<?= $libro['autor'] ?>" autocomplete="off" required>
        </label>
      </div>
      <div class="mb-3">
        <label>Fecha de Publicación
          <input type="date" name="fecha" class="form-control" value="<?= $libro['fecha'] ?>" autocomplete="off" required>
      </div>
        </label>
      <div class="mb-3">
        <label>Género</label>
        <input type="text" name="genero" class="form-control" value="<?= $libro['genero'] ?>" autocomplete="off" required>
      </div>
    <button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

