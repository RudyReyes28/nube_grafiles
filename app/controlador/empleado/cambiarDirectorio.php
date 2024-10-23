<?php
session_start();
$idDirectorioActual = $_POST['idDirectorio']; // Obtener el ID del directorio actual de la solicitud POST
$directorioActual = $_POST['nombreDirectorio']; // Obtener el directorio actual de la solicitud POST
$_SESSION['id_directorio_actual'] = $idDirectorioActual; // Almacenar el ID del directorio actual en la sesión
header("Location: ../../vista/empleado/vistaEmpleado.php?directorio=$directorioActual");

?>