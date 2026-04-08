<?php
  include("fragmentos/return_to_zero.php"); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biblioteca Virtual</title>
  <link rel="stylesheet" href="CSS/graficos.css">
  <link rel="stylesheet" href="CSS/nav.css">
  <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/morph/bootstrap.min.css" rel="stylesheet">
  <script src="JS/return_to_zero.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<?php include("fragmentos/nav.php");?>
<div style="width: 100%; height: 100%;">
  <?php 
      if (isset($_GET['type']) && $_GET['type'] == 'fecha') {
          echo "<canvas id='grafico_fecha'></canvas>
                <script src='JS/chart_fecha.js'></script>";
      }
      if (isset($_GET['type']) && $_GET['type'] == 'genero') {
          echo "<canvas id='grafico_genero'></canvas>
                <script src='JS/chart_genero.js'></script>";
      }
      if (isset($_GET['type']) && $_GET['type'] == 'autor') {
          echo "<canvas id='grafico_autor'></canvas>
                <script src='JS/chart_autor.js'></script>";
      }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>