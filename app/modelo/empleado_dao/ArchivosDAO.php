<?php
    require_once '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
    require_once '../../modelo/conexiondb/Conexion.php'; // Incluye la clase de conexión a la base de datos

    
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
                    'fecha_creacion' => new MongoDB\BSON\UTCDateTime(),
                    'estado' => "activo",
                    'fecha_eliminacion' => null
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

        public static function subirImagen($nombreArchivo, $extensionArchivo, $rutaImagen, $directorioPadre, $idUsuario){
            $collection = Conexion::obtenerColeccion('archivos');
            
            
                // Crear el archivo en MongoDB
                $nuevoArchivo = [
                    'nombre' => $nombreArchivo,
                    'extension' => $extensionArchivo,
                    'contenido' => $rutaImagen,
                    'carpeta_padre' =>new MongoDB\BSON\ObjectId($directorioPadre),
                    'usuario_propietario' => new MongoDB\BSON\ObjectId($idUsuario),
                    'fecha_creacion' => new MongoDB\BSON\UTCDateTime(),
                    'estado' => "activo",
                    'fecha_eliminacion' => null
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

        public static function obtenerArchivos($idDirectorio){
            $collection = Conexion::obtenerColeccion('archivos');
            $archivos = $collection->find(['carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorio)]);
            return $archivos;
        }

        public static function moverArchivo($idArchivo, $idDirectorio){
            $collection = Conexion::obtenerColeccion('archivos');
            $updateResult = $collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($idArchivo)],
                ['$set' => ['carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorio)]]
            );
            if ($updateResult->getModifiedCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }


?>