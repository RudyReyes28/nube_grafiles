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
            $archivos = $collection->find(['carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorio),
            'estado' => 'activo']);
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

        public static function eliminarArchivo($idArchivo){
            $collection = Conexion::obtenerColeccion('archivos');
            $updateResult = $collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($idArchivo)],
                ['$set' => ['estado' => 'inactivo', 'fecha_eliminacion' => new MongoDB\BSON\UTCDateTime()]]
            );
            if ($updateResult->getModifiedCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public static function obtenerRestoUsuarios($idUsuario){
            $coleccion = Conexion::obtenerColeccion('usuarios'); // Obtiene la colección 'empleados'

            $usuarios = $coleccion->find(['_id' => ['$ne' => new MongoDB\BSON\ObjectId($idUsuario)]]); // Obtiene todos los documentos de la colección excepto el usuario actual

            

            return $usuarios; // Retorna el arreglo de usuarios
        }

        public static function compartirArchivo($nombreArchivo, $extensionArchivo, $contenidoArchivo,$idUsuario, $nombreUsuario, $idUsuarioCompartido){
            $collection = Conexion::obtenerColeccion('archivos_compartidos');
            $nuevoArchivo = [
                'nombre' => $nombreArchivo,
                'extension' => $extensionArchivo,
                'contenido' => $contenidoArchivo,
                'usuario_propietario' => new MongoDB\BSON\ObjectId($idUsuario),
                'fecha_compartido' => new MongoDB\BSON\UTCDateTime(),
                'nombre_propietario' => $nombreUsuario,
                'estado' => "activo",
                'fecha_eliminacion' => null,
                'usuario_compartido' => new MongoDB\BSON\ObjectId($idUsuarioCompartido)
            ];

            $insertResult = $collection->insertOne($nuevoArchivo);

            if ($insertResult->getInsertedCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public static function obtenerArchivosCompartidos($idUsuario){
            $collection = Conexion::obtenerColeccion('archivos_compartidos');
            $archivos = $collection->find(['usuario_compartido' => new MongoDB\BSON\ObjectId($idUsuario),
            'estado' => 'activo']);
            return $archivos;
        }

        public static function eliminarArchivoCompartido($idArchivo){
            $collection = Conexion::obtenerColeccion('archivos_compartidos');
            $updateResult = $collection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($idArchivo)],
                ['$set' => ['estado' => 'inactivo_c', 'fecha_eliminacion' => new MongoDB\BSON\UTCDateTime()]]
            );
            if ($updateResult->getModifiedCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

    }


?>