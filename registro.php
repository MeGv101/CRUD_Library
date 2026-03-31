<?php
  include("fragmentos/return_to_zero.php"); 
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
<h2>Agregar Libro</h2>
<form action="guardar_libro.php" method="POST" class="card p-4">
  <div class="mb-3">
    <label>Título
      <input type="text" name="titulo" class="form-control" autocomplete="off" required >
    </label>
  </div>
  <div class="mb-3">
    <label>Autor
      <input type="text" name="autor" class="form-control" autocomplete="off" required>
    </label>
  </div>
  <div class="mb-3">
    <label>Fecha de Publicación
      <input type="date" name="fecha" class="form-control" autocomplete="off" required>
    </label>
  </div>
  <div class="mb-3">
    <label>Género
      <input type="text" name="genero" class="form-control" autocomplete="off" required>
    </label>
  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
