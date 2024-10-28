<?php
    require_once '../../modelo/empleado_dao/ArchivosDAO.php';
    session_start();
    $nombreArchivo = $_POST['nombreArchivoComp'];
    $extensionArchivo= $_POST['extensionArchivoComp'];
    $contenidoArchivo = $_POST['contenidoArchivoComp'];
    $idUsuario = $_POST['idUsuarioComp'];
    $nombreUsuario = $_SESSION['usuario']['nombre_usuario'];
    $idUsuarioComp = $_POST['idUsuarioCompartido'];

    $tipoEmpleado = $_SESSION['tipo_empleado'];

    /*echo $nombreArchivo.'<br>';
    echo $extensionArchivo.'<br>';
    echo $contenidoArchivo.'<br>';
    echo $idUsuario.'<br>';
    echo $nombreUsuario.'<br>';
    echo $idUsuarioComp.'<br>';
    echo $tipoEmpleado.'<br>';*/


    $nombreDirectorio = $_SESSION['directorio_actual'];
    $realizado= ArchivosDAO::compartirArchivo($nombreArchivo, $extensionArchivo, $contenidoArchivo, $idUsuario, $nombreUsuario, $idUsuarioComp);

    if($tipoEmpleado == "administrador"){
        header('Location: ../../vista/administrador/vistaAdministrador.php?directorio='.$nombreDirectorio);
    }else{
        header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/
    }

?>