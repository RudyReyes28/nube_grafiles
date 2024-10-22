<?php
require '../../modelo/empleado_dao/ArchivosDAO.php';
session_start();
$directorioDestino = 'uploads/'; 

if (!is_dir($directorioDestino)) {
    mkdir($directorioDestino, 0755, true);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
   // Obtener el nombre original del archivo y la ruta temporal
   $nombreArchivo = $_FILES['archivoImagen']['name'];
   $tipoArchivo = $_FILES['archivoImagen']['type'];
   $archivoTmp = $_FILES['archivoImagen']['tmp_name'];
   $directorioPadre = $_POST['idDirectorioPadre'];
   $nombreDirectorio = $_SESSION['directorio_actual'];
   $idUsuario = $_SESSION['usuario']['_id'];

    $nombreFinal = $directorioDestino . basename($nombreArchivo);

    if (move_uploaded_file($archivoTmp, $nombreFinal)) {

        $realizado = ArchivosDAO::subirImagen($nombreArchivo, $tipoArchivo, $nombreFinal, $directorioPadre, $idUsuario);
        if ($realizado) {
            // Redirigir a la vista de archivos/directorios
            header('Location: ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio);
        }else{
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Error al crear el archivo.";
    }
}


?>