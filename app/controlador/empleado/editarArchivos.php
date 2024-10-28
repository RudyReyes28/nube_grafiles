<?php
require_once '../../modelo/empleado_dao/EditarArchivos.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $archivoId = $_POST['archivoId'];
    $nombreArchivo = $_POST['nombreArchivo'];
    $nombreDirectorio = $_SESSION['directorio_actual'];

     if (isset($_FILES['reemplazarImagen']) && $_FILES['reemplazarImagen']['error'] === UPLOAD_ERR_OK) {
        
        // Lógica para manejar la imagen
        $imagenTmp = $_FILES['reemplazarImagen']['tmp_name'];
        $imagenNombre = $_FILES['reemplazarImagen']['name'];
        
        // Guardar la imagen (cambiar la ruta según tus necesidades)
        $rutaDestino = "uploads/" . $imagenNombre;
        move_uploaded_file($imagenTmp, $rutaDestino);

        $realizado = EditarArchivos::editarArchivo($archivoId, $rutaDestino);
    } else {
        // Lógica para manejar el contenido del archivo de texto o HTML
        
        $contenidoArchivo = $_POST['contenidoArchivo'];

        $realizado = EditarArchivos::editarArchivo($archivoId, $contenidoArchivo);

        
    }

    $tipoEmpleado = $_SESSION['tipo_empleado'];
    if($tipoEmpleado == "administrador"){
        header('Location: ../../vista/administrador/vistaAdministrador.php?directorio='.$nombreDirectorio);
    }else{
        header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/
    }
}

?>