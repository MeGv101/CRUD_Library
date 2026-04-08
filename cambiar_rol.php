<?php
include("conexion.php");

$id = $_GET['id'];

$roles = $conexion->query("
    SELECT * FROM rol 
    WHERE rol_id != 3
");

if (isset($_POST['rol_id'])) {
    $nuevoRol = $_POST['rol_id'];

    $conexion->query("
        UPDATE cuenta 
        SET rol_id = $nuevoRol 
        WHERE id = $id
    ");

    header("Location: usuarios.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biblioteca Virtual</title>
  <link rel="stylesheet" href="CSS/rol.css">
  <link rel="stylesheet" href="CSS/nav.css">
  <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/morph/bootstrap.min.css" rel="stylesheet">
  <script src="JS/return_to_zero.js"></script>
</head>
<body class="bg-light">
<?php include("fragmentos/nav.php");?>
<form method="POST">
    <label>Nuevo rol:</label>
    <select name="rol_id">
        <?php while($rol = $roles->fetch_assoc()): ?>
            <option value="<?= $rol['rol_id'] ?>">
                <?= $rol['nombre'] ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Guardar</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>