
<?php

require '../../../vendor/autoload.php'; // Incluye el autoloader de Composer

class Conexion
{
    private static $cliente = null;
    private static $baseDatos = null;

    // Constructor privado para evitar instancias directas
    private function __construct() {}

    // Método para obtener la conexión a MongoDB
    public static function obtenerConexion()
    {
        if (self::$cliente === null) {
            self::$cliente = new MongoDB\Client("mongodb://localhost:27017");
        }

        return self::$cliente;
    }

    // Método para obtener la base de datos
    public static function obtenerBaseDatos($nombreBaseDatos = 'nube_grafiles')
    {
        if (self::$baseDatos === null) {
            self::$baseDatos = self::obtenerConexion()->selectDatabase($nombreBaseDatos);
        }

        return self::$baseDatos;
    }

    // Método para obtener una colección
    public static function obtenerColeccion($nombreColeccion)
    {
        return self::obtenerBaseDatos()->selectCollection($nombreColeccion);
    }
}

?>

