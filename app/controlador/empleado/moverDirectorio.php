<?php
    require_once '../../modelo/empleado_dao/DirectoriosDAO.php';

    session_start();

    $idDirectorioA = $_POST['directorioIdMov'];
    $idDirectorioDestino = $_POST['directorioDestinoDir'];
    $nombreDirectorio = $_SESSION['directorio_actual'];
    
    $realizado = DirectorioDAO::moverDirectorio($idDirectorioA, $idDirectorioDestino);
    $tipoEmpleado = $_SESSION['tipo_empleado'];
    if($tipoEmpleado == "administrador"){
        header('Location: ../../vista/administrador/vistaAdministrador.php?directorio='.$nombreDirectorio);
    }else{
        header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/
    }

?>