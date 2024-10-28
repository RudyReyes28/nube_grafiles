<?php
    require_once '../../modelo/empleado_dao/ArchivosDAO.php';

    session_start();

    $idArchivo = $_POST['archivoIdMov'];
    $nombreArchivo = $_POST['nombreArchivoMov'];
    $idDirectorio = $_POST['directorioDestino'];
    $nombreDirectorio = $_SESSION['directorio_actual'];
    //echo 'Archivo'.$idArchivo."<br>";
    //echo 'Nombre'.$nombreArchivo."<br>";
    //echo 'Directorio'.$idDirectorio;

    $realizado = ArchivosDAO::moverArchivo($idArchivo,  $idDirectorio);
    
    $tipoEmpleado = $_SESSION['tipo_empleado'];
    if($tipoEmpleado == "administrador"){
        header('Location: ../../vista/administrador/vistaAdministrador.php?directorio='.$nombreDirectorio);
    }else{
        header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/
    }

?>