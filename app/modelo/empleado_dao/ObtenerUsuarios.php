<?php
 require '../../../vendor/autoload.php'; // Incluye el autoloader de Composer
 require '../../modelo/conexiondb/Conexion.php'; // Incluye la clase de conexión a la base de datos
    Class ObtenerUsuarios
    {
        public static function obtenerUsuarios()
        {
           

            $coleccion = Conexion::obtenerColeccion('usuarios'); // Obtiene la colección 'empleados'

            $usuarios = $coleccion->find(); // Obtiene todos los documentos de la colección

            $usuariosArray = array(); // Crea un arreglo vacío

            foreach ($usuarios as $usuario) { // Recorre los documentos obtenidos
                $usuarioArray = array( // Crea un arreglo con los datos del usuario
                    'id' => $usuario['_id'],
                    'nombre' => $usuario['nombre_usuario'],
                    'usuario' => $usuario['usuario'],
                    'contrasenia' => $usuario['password'],
                    'rol' => $usuario['rol']
                );

                array_push($usuariosArray, $usuarioArray); // Agrega el arreglo del usuario al arreglo de usuarios
            }

            return $usuariosArray; // Retorna el arreglo de usuarios
        }

        
        public static function obtenerUsuario($usuario)
        {
            $coleccion = Conexion::obtenerColeccion('usuarios'); // Obtiene la colección 'empleados'

            $usuario = $coleccion->findOne(['usuario' => $usuario]); // Obtiene el documento con el usuario especificado

            return $usuario; // Retorna el usuario
        }
    }

?>