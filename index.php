<?php
session_start();
require_once '../config/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Gestión de Alumnos</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Alumnos</h1>
        <?php if ($_SESSION['rol'] == 'admin') { ?>
            <div class="row">
                <div class="col-md-4">
                    <h3>Registrar Alumno</h3>
                    <form id="form-alumno">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="anio_ingreso" class="form-label">Año de Ingreso</label>
                            <input type="number" class="form-control" id="anio_ingreso" required>
                        </div>
                        <div class="mb-3">
                            <label for="carrera" class="form-label">Carrera</label>
                            <input type="text" class="form-control" id="carrera" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registrar</button>
                    </form>
                </div>
                <div class="col-md-8">
                    <h3>Lista de Alumnos</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Año Ingreso</th>
                                <th>Carrera</th>
                                <th>Fecha Nacimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="listado-alumnos">
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } else { ?>
            <h3>Tu información registrada:</h3>
            <div id="info-alumno"></div>
        <?php } ?>
    </div>
    <script src="public/js/alumnos.js"></script>
</body>
</html>
