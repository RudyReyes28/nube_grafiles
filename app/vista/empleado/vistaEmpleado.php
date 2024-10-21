<?php
    session_start();

    $usuarioEmpleado = $_SESSION['usuario'];
    $nombreUsuario = $usuarioEmpleado['nombre_usuario'];
    $usuario = $usuarioEmpleado['usuario'];
    $idUsuario = (string) $usuarioEmpleado['_id'];

    echo 'nombre '.$nombreUsuario.' id'.$idUsuario.' <br>';
    echo 'usuario '.$usuario.' <br>';


?>