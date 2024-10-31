<?php
    require_once '../../modelo/empleado_dao/DirectoriosDAO.php';
    session_start();
    $idDirectorio = $_POST['directorioIdElim'];
    $nombreDirectorio = $_SESSION['directorio_actual'];

    $realizado = DirectorioDAO::eliminarDirectorio($idDirectorio);
    $tipoEmpleado = $_SESSION['tipo_empleado'];
    if($tipoEmpleado == "administrador"){
        header('Location: ../../vista/administrador/vistaAdministrador.php?directorio='.$nombreDirectorio);
    }else{
        header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/
    }
?>