<?php
     require '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
     require '../../modelo/conexiondb/Conexion.php'; // Incluye la clase de conexión a la base de datos
     use MongoDB\BSON\ObjectId; // Incluye la clase ObjectId de MongoDB



     class ObtenerDirectorio{
        public static function obtenerDirectorioRaiz($nombreDirectorio, $idUsuarioPropietario)
        {
            //$id = new MongoDB\BSON\($idUsuarioPropietario);
            $coleccion = Conexion::obtenerColeccion('directorios'); // Obtiene la colección 'empleados'

            $directorio = $coleccion->findOne([
                'nombre' => $nombreDirectorio,
                'usuario_propietario' => $idUsuarioPropietario
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
     }
?>