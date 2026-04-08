<?php
  include("fragmentos/return_to_zero.php");
    if ($_SESSION['rol_id'] != 3) {
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
$resultado = $conexion->query("
    SELECT cuenta.id, cuenta.usuario, rol.nombre 
    FROM cuenta 
    JOIN rol ON cuenta.rol_id = rol.rol_id
    WHERE cuenta.rol_id != 3
");
?>
<div id='report'>
  <h2 class="mb-4">Listado de Usuarios registrados</h2>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Usuario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php while($fila = $resultado->fetch_assoc()): ?>
      <tr>
        <td><?= $fila['usuario'] ?></td>
        <td>
            <?= $fila['nombre'] ?>
            <a href="cambiar_rol.php?id=<?= $fila['id'] ?>" class="btn btn-primary btn-sm">
                Cambiar rol
            </a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>