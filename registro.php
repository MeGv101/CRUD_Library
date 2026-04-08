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
  <title>Agregar Libro</title>

  <link rel="stylesheet" href="CSS/usuario.css">
  <link rel="stylesheet" href="CSS/nav.css">

  <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/morph/bootstrap.min.css" rel="stylesheet">
  <script src="JS/return_to_zero.js"></script>
</head>
<body>

<?php include("fragmentos/nav.php");?>

<div class="contenedor-login">
    <div class="card-login">
        <h2 class="titulo">Agregar Libro</h2>
        <p class="subtitulo">Registra un nuevo libro en la biblioteca</p>

        <form action="guardar_libro.php" method="POST">

            <div class="input-group">
                <span class="input-group-text">📖</span>
                <input type="text" name="titulo" class="form-control" placeholder="Título" required>
            </div>

            <div class="input-group">
                <span class="input-group-text">✍️</span>
                <input type="text" name="autor" class="form-control" placeholder="Autor" required>
            </div>

            <div class="input-group">
                <span class="input-group-text">📅</span>
                <input type="date" name="fecha" class="form-control" required>
            </div>

            <div class="input-group">
                <span class="input-group-text">🏷️</span>
                <input type="text" name="genero" class="form-control" placeholder="Género" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Guardar Libro
            </button>

        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
