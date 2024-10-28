<?php
session_start();
require '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
require '../../modelo/empleado_dao/ArchivosDAO.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir los datos del formulario
    $nombreArchivo = $_POST['nombreArchivo'];
    $extensionArchivo = $_POST['extensionArchivo'];
    $contenidoArchivo = $_POST['contenidoArchivo'];
    $directorioPadre = $_POST['idDirectorioPadre'];
    $nombreDirectorio = $_SESSION['directorio_actual'];
    $idUsuario = $_SESSION['usuario']['_id'];

    //echo "Nombre archivo: " . $nombreArchivo . "<br>";
    //echo "Extensión archivo: " . $extensionArchivo . "<br>";
    //echo "Contenido archivo: " . $contenidoArchivo . "<br>";
    //echo "Directorio padre: " . $directorioPadre . "<br>";
    //echo "ID Usuario: " . $idUsuario . "<br>";
    //var_dump(new MongoDB\BSON\ObjectId($directorioPadre));
    //var_dump(new MongoDB\BSON\ObjectId($idUsuario));
    //var_dump(new MongoDB\BSON\UTCDateTime());

    $realizado = ArchivosDAO::crearArchivo($nombreArchivo, $extensionArchivo, $contenidoArchivo, $directorioPadre, $idUsuario);
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