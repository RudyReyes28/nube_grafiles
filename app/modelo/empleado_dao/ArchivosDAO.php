<?php
    require '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
    require '../../modelo/conexiondb/Conexion.php'; // Incluye la clase de conexión a la base de datos

    
    class ArchivosDAO{
        public static function crearArchivo($nombreArchivo, $extensionArchivo, $contenidoArchivo, $directorioPadre, $idUsuario){
            
            $collection = Conexion::obtenerColeccion('archivos');
            
            // Verificar si el nombre del archivo es válido (sin caracteres especiales)
            if (preg_match('/^[a-zA-Z0-9_-]+$/', $nombreArchivo)) {
                // Crear el archivo en MongoDB
                $nuevoArchivo = [
                    'nombre' => $nombreArchivo,
                    'extension' => $extensionArchivo,
                    'contenido' => $contenidoArchivo,
                    'carpeta_padre' =>new MongoDB\BSON\ObjectId($directorioPadre),
                    'usuario_propietario' => new MongoDB\BSON\ObjectId($idUsuario),
                    'fecha_creacion' => new MongoDB\BSON\UTCDateTime()
                ];
        
                // Insertar el archivo en la colección
                $insertResult = $collection->insertOne($nuevoArchivo);
        
                if ($insertResult->getInsertedCount() > 0) {
                    // Redirigir a la vista de archivos/directorios
                    return true;
                } else {
                    return false;
                }
            }
        }
    }


?>