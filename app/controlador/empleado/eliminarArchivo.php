<?php
    require_once '../../modelo/empleado_dao/ArchivosDAO.php';
    session_start();
    $idArchivo = $_POST['archivoIdElim'];
    $nombreDirectorio = $_SESSION['directorio_actual'];

    $realizado = ArchivosDAO::eliminarArchivo($idArchivo);
    $tipoEmpleado = $_SESSION['tipo_empleado'];
    if($tipoEmpleado == "administrador"){
        header('Location: ../../vista/administrador/vistaAdministrador.php?directorio='.$nombreDirectorio);
    }else{
        header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/
    }
?>