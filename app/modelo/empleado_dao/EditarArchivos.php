<?php
require_once '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
require_once '../../modelo/conexiondb/Conexion.php'; // Incluye la clase de conexión a la base de datos


class EditarArchivos{
    public static function editarArchivo($idArchivo, $contenidoArchivo){
        $collection = Conexion::obtenerColeccion('archivos');
        
        // Crear el filtro para buscar el archivo por su ID
        $filtro = ['_id' => new MongoDB\BSON\ObjectId($idArchivo)];
        
        // Crear el nuevo contenido del archivo
        $nuevoContenido = ['$set' => ['contenido' => $contenidoArchivo]];
        
        // Actualizar el contenido del archivo en MongoDB
        $updateResult = $collection->updateOne($filtro, $nuevoContenido);
        
        if ($updateResult->getModifiedCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>