<?php
    require '../../modelo/empleado_dao/ObtenerDirectorio.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recibir los datos del formulario
        $nombreDirectorioC = $_POST['nombreDirectorio'];
        $directorioPadre = $_POST['idDirectorioPadre'];
        $nombreDirectorio = $_SESSION['directorio_actual'];
        $idUsuario = $_SESSION['usuario']['_id'];
    
        
        $realizado = ObtenerDirectorio::crearDirectorio($nombreDirectorioC, $idUsuario, $directorioPadre);
        if ($realizado) {
            // Redirigir a la vista de archivos/directorios
            $tipoEmpleado = $_SESSION['tipo_empleado'];
    if($tipoEmpleado == "administrador"){
        header('Location: ../../vista/administrador/vistaAdministrador.php?directorio='.$nombreDirectorio);
    }else{
        header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/
    }
        } else {
            echo "Error al crear el archivo.";
        }
    }

?>