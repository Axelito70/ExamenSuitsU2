<?php
session_start();
require_once '../config/conexion.php';

$id_usuario = $_SESSION['id_usuario']; // El id de la sesión del alumno

$query = $conexion->prepare("SELECT * FROM t_alumnos WHERE id = :id_usuario");
$query->bindParam(':id_usuario', $id_usuario);
$query->execute();

$alumno = $query->fetch(PDO::FETCH_ASSOC);
echo json_encode($alumno);
?>
