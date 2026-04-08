<?php

include("../conexion.php");

$sql = "SELECT YEAR(fecha) as anio, COUNT(*) as total
        FROM libro
        GROUP BY anio
        ORDER BY anio";

$result = $conexion->query($sql);

$data = [];

while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>