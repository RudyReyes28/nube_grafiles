<?php
require_once '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
require_once '../../modelo/conexiondb/Conexion.php'; // Incluye la clase de conexión a la base de datos

    class TrabajadoresDAO{

        public static function crearEmpleado($nombre, $email, $usuario, $password){
            $collection = Conexion::obtenerColeccion('usuarios');
            
                // Crear el empleado en MongoDB
                $nuevoEmpleado = [
                    'nombre_usuario' => $nombre,
                    'email' => $email,
                    'usuario' => $usuario,
                    'password' => $password,
                    'rol' => 'empleado',
                    'fecha_creacion' => new MongoDB\BSON\UTCDateTime(),
                    'estado' => 'activo'
                ];
        
                // Insertar el empleado en la colección
                $insertResult = $collection->insertOne($nuevoEmpleado);
        
                if ($insertResult->getInsertedCount() > 0) {
                    $idEmpleado = $insertResult->getInsertedId();
                    // Crear el directorio raíz del empleado
                    $creacionDirectorio = self::crearDirectorioRaiz($idEmpleado);
                } else {
                    return false;
                }
        }

        public static function crearDirectorioRaiz($idEmpleado){
            $collection = Conexion::obtenerColeccion('directorios');
            
            // Crear el directorio raíz en MongoDB
            $nuevoDirectorio = [
                'nombre' => 'raiz',
                'carpeta_padre' => null,
                'usuario_propietario' => new MongoDB\BSON\ObjectId($idEmpleado),
                'fecha_creacion' => new MongoDB\BSON\UTCDateTime(),
                'estado' => 'activo'
            ];
    
            // Insertar el directorio raíz en la colección
            $insertResult = $collection->insertOne($nuevoDirectorio);
    
            if ($insertResult->getInsertedCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    } 
?>