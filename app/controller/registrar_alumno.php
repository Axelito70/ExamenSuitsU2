<?php
require_once '../config/conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$anio_ingreso = $_POST['anio_ingreso'];
$carrera = $_POST['carrera'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$query = $conexion->prepare("INSERT INTO t_alumnos (nombre, apellido, anio_ingreso, carrera, fecha_nacimiento) 
                             VALUES (:nombre, :apellido, :anio_ingreso, :carrera, :fecha_nacimiento)");

$query->bindParam(':nombre', $nombre);
$query->bindParam(':apellido', $apellido);
$query->bindParam(':anio_ingreso', $anio_ingreso);
$query->bindParam(':carrera', $carrera);
$query->bindParam(':fecha_nacimiento', $fecha_nacimiento);

if ($query->execute()) {
    echo json_encode(['mensaje' => 'Alumno registrado con éxito']);
} else {
    echo json_encode(['mensaje' => 'Error al registrar alumno']);
}
?>
