<?php
    require_once '../../modelo/admin_dao/TrabajadoresDAO.php'; // Incluye la clase TrabajadoresDAO
    session_start();
    // Obtener los datos del formulario
    $nombre = $_POST['nombreEmpleado'];
    $email = $_POST['correoEmpleado'];
    $usuario = $_POST['usuarioEmpleado'];
    $password = $_POST['contraseniaEmpleado'];
    $hasContrasenia = password_hash($password, PASSWORD_DEFAULT);

    // Crear el empleado en la base de datos
    $creacionEmpleado = TrabajadoresDAO::crearEmpleado($nombre, $email, $usuario, $hasContrasenia );

    $nombreDirectorio = $_SESSION['directorio_actual'];
    header('Location: ../../vista/administrador/vistaAdministrador.php?directorio='.$nombreDirectorio);
?>