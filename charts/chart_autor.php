<?php

include("../conexion.php");

$sql = "SELECT autor, COUNT(*) as total 
        FROM libro 
        GROUP BY autor";

$result = $conexion->query($sql);

$data = [];

while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>