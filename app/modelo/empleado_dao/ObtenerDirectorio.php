<?php
     require_once '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
     require_once '../../modelo/conexiondb/Conexion.php'; // Incluye la clase de conexión a la base de datos
     use MongoDB\BSON\ObjectId; // Incluye la clase ObjectId de MongoDB



     class ObtenerDirectorio{
        public static function obtenerDirectorioRaiz($nombreDirectorio, $idUsuarioPropietario)
        {
            //$id = new MongoDB\BSON\($idUsuarioPropietario);
            $coleccion = Conexion::obtenerColeccion('directorios'); // Obtiene la colección 'empleados'

            $directorio = $coleccion->findOne([
                'nombre' => $nombreDirectorio,
                'usuario_propietario' => new MongoDB\BSON\ObjectId($idUsuarioPropietario)
            ]);
            return $directorio; // Retorna el usuario
        }


        public static function obtenerDirectorioHijo($nombreDirectorio, $idUsuarioPropietario, $idDirectorioPadre)
        {
            //$id = new MongoDB\BSON\($idUsuarioPropietario);
            $coleccion = Conexion::obtenerColeccion('directorios'); // Obtiene la colección 'empleados'

            $directorio = $coleccion->findOne([
                'nombre' => $nombreDirectorio,
                'usuario_propietario' => $idUsuarioPropietario,
                'carpeta_padre' =>new MongoDB\BSON\ObjectId( $idDirectorioPadre)
            ]);
            return $directorio; // Retorna el usuario
        }

        public static function obtenerDirectoriosHijos($idDirectorioPadre)
        {
            $coleccion = Conexion::obtenerColeccion('directorios'); // Obtiene la colección 'empleados'

            $directorios = $coleccion->find([
                'carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorioPadre)
            ]);
            return $directorios; // Retorna el usuario
        }

        public static function crearDirectorio($nombreDirectorio, $idUsuarioPropietario, $idDirectorioPadre)
        {
            $coleccion = Conexion::obtenerColeccion('directorios'); // Obtiene la colección 'empleados'

            $nuevoDirectorio = [
                'nombre' => $nombreDirectorio,
                'carpeta_padre' => new MongoDB\BSON\ObjectId($idDirectorioPadre),
                'usuario_propietario' => new MongoDB\BSON\ObjectId($idUsuarioPropietario),
                'fecha_creacion' => new MongoDB\BSON\UTCDateTime(),
                'estado' => "activo"
            ];

            $insertResult = $coleccion->insertOne($nuevoDirectorio);

            if ($insertResult->getInsertedCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public static function obtenerDirectoriosUsuario($idUsuarioPropietario)
        {
            $coleccion = Conexion::obtenerColeccion('directorios'); // Obtiene la colección 'empleados'

            $directorios = $coleccion->find([
                'usuario_propietario' => new MongoDB\BSON\ObjectId($idUsuarioPropietario)
            ]);
            return $directorios; // Retorna el usuario
        }
     }
?>