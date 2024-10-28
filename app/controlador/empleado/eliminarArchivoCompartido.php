<?php
require_once '../../modelo/empleado_dao/ArchivosDAO.php';
session_start();
    $idArchivo = $_POST['archivoIdElim'];
    $tipoEmpleado = $_SESSION['tipo_empleado'];
    $realizado = ArchivosDAO::eliminarArchivoCompartido($idArchivo);
    if($tipoEmpleado == "administrador"){
        header("Location: ../../vista/administrador/vistaCompartidoAdministradir.php");
    }else{
        header('Location:  ../../vista/empleado/vistaCompartidoEmpleado.php'); 
    }
?>