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
<?php
$resultado = $conexion->query("SELECT * FROM libro");
?>
<div id='report'>
  <h2 class="mb-4">Listado de libros disponibles</h2>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Publicación</th>
        <th>Género</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php while($fila = $resultado->fetch_assoc()): ?>
      <tr>
        <td><?= $fila['titulo'] ?></td>
        <td><?= $fila['autor'] ?></td>
        <td><?= $fila['fecha'] ?></td>
        <td><?= $fila['genero'] ?></td>
        <td>
          <a href="editar_libro.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
          <a href="eliminar_libro.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este libro?');">Eliminar</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<a href="registro.php" class="btn btn-primary mb-3">Agregar libro</a>
<h3 class="mb-4">Gráficos:</h3>
<a href="grafico.php?type=genero" class="btn btn-primary mb-3">Ordenar por Género</a>
<a href="grafico.php?type=fecha" class="btn btn-primary mb-3">Ordenar por Año de Publicación</a>
<a href="grafico.php?type=autor" class="btn btn-primary mb-3">Ordenar por Autor</a>
<h3 class="mb-4">Reporte </h3>
<script src="JS/reportes.js"></script>
<button class="btn btn-primary mb-3" onclick="descargarPDF()">Descargar PDF</button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</body>
</html>
