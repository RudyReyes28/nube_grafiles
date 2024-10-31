<?php
require_once '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
require_once '../../modelo/conexiondb/Conexion.php'; // Incluye la clase de conexión a la base de datos


class DirectorioDAO
{

    public static function eliminarDirectorio($idDirectorio)
    {
        $collectionDirectorios = Conexion::obtenerColeccion('directorios');
        $collectionArchivos = Conexion::obtenerColeccion('archivos');

        // Cambiamos el estado a "inactivo" de todos los archivos en el directorio actual
        $collectionArchivos->updateMany(
            ['carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorio)],
            ['$set' => ['estado' => 'inactivo', 'fecha_eliminacion' => new MongoDB\BSON\UTCDateTime()]]
        );

        // Encontramos los subdirectorios dentro del directorio actual
        $subdirectorios = $collectionDirectorios->find(['carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorio)]);

        // Recorremos cada subdirectorio y aplicamos la función recursivamente
        foreach ($subdirectorios as $subdirectorio) {
            self::eliminarDirectorio($subdirectorio['_id']); // Llamada recursiva
        }

        // Finalmente, cambiamos el estado a "inactivo" del directorio actual
        $collectionDirectorios->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($idDirectorio)],
            ['$set' => ['estado' => 'inactivo', 'fecha_eliminacion' => new MongoDB\BSON\UTCDateTime()]]
        );

        return true;

    }

    public static function moverDirectorio($idDirectorio, $idDirectorioDestino) {
        // Primero verificamos si el directorio destino es un descendiente del directorio actual
        if (self::esDescendiente($idDirectorio, $idDirectorioDestino)) {
            return false;
        }
    
        $collectionDirectorios = Conexion::obtenerColeccion('directorios');
    
        // Actualizamos el directorio actual con el nuevo directorio padre
        $collectionDirectorios->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($idDirectorio)],
            ['$set' => ['carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorioDestino)]]
        );
    
        return true;
    }
    
    private static function esDescendiente($idDirectorio, $idDirectorioDestino) {
        $collectionDirectorios = Conexion::obtenerColeccion('directorios');
    
        $subdirectorios = $collectionDirectorios->find(['carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorio)]);
    
        foreach ($subdirectorios as $subdirectorio) {

            if ($subdirectorio['_id'] == new MongoDB\BSON\ObjectId($idDirectorioDestino)) {
                return true;
            }

            if (self::esDescendiente($subdirectorio['_id'], $idDirectorioDestino)) {
                return true;
            }
        }
    
        return false;
    }

}

?>