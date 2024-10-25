<?php
require_once '../../modelo/empleado_dao/ArchivosDAO.php';
session_start();
$idDirectorio= $_POST['idDirectorioPadre'];
$nombreArchivo = $_POST['nombreArchivo'] . 'copia';
$extensionArchivo = $_POST['extensionArchivo'];
$contenidoArchivo = $_POST['contenidoArchivo'];
$idUsuario = $_SESSION['usuario']['_id'];
$nombreDirectorio = $_SESSION['directorio_actual'];


if($extensionArchivo == '.txt' || $extensionArchivo == '.html'){
    $realizado = ArchivosDAO::crearArchivo($nombreArchivo, $extensionArchivo, $contenidoArchivo, $idDirectorio, $idUsuario);
}else{
    $realizado= ArchivosDAO::subirImagen($nombreArchivo, $extensionArchivo, $contenidoArchivo, $idDirectorio, $idUsuario);
}
header('Location:  ../../vista/empleado/vistaEmpleado.php?directorio=' . $nombreDirectorio); // Cambia a la página que desees*/

?>