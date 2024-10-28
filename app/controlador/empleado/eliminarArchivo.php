<?php
    require_once '../../modelo/empleado_dao/ArchivosDAO.php';
    session_start();
    $idArchivo = $_POST['archivoIdElim'];
    $nombreDirectorio = $_SESSION['directorio_actual'];

    $realizado = ArchivosDAO::eliminarArchivo($idArchivo);
    header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/


?>