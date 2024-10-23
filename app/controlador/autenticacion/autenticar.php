<?php
require '../../modelo/empleado_dao/ObtenerUsuarios.php'; // Incluye la clase para obtener los usuarios
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    $usuarioE = ObtenerUsuarios::obtenerUsuario($usuario)->getArrayCopy(); // Obtiene el usuario con el nombre de usuario especificado

    

    
if ($usuarioE && password_verify($contrasenia, $usuarioE['password'])) {
    session_start();
    switch ($usuarioE['rol']) {

        case 'empleado':
            $_SESSION['usuario'] = $usuarioE;
            $directorioRaiz = 'raiz'; // O el ID del directorio raíz específico

            // Almacenar el directorio en la sesión para facilitar su uso en la vista
            $_SESSION['directorio_actual'] = $directorioRaiz;
            $_SESSION['id_directorio_padre'] = null;
            $_SESSION['id_directorio_actual'] = null;

            // Redirigir a la vista del empleado, pasando el directorio raíz
            header("Location: ../../vista/empleado/vistaEmpleado.php?directorio=$directorioRaiz");
            exit;
        case 'administrador':
            $_SESSION['usuario'] = $usuarioE;
            //header("Location: ../../vista/administrador/vistaAdministrador.php");
            exit;
        default:
            $error = "Tipo de usuarioE $usuarioE desconocido.";
            break;
    }
} else {
    
     $error = "Usuario o contraseña incorrectos.";
    echo $error;
}
?>