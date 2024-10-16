<?php
require_once '../config/conexion.php';

$query = $conexion->query("SELECT * FROM t_alumnos");
$alumnos = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($alumnos);
?>
