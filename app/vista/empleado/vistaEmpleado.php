<?php
require '../../modelo/empleado_dao/ObtenerDirectorio.php'; // Incluye la clase para obtener los directorios
session_start();

$usuarioEmpleado = $_SESSION['usuario'];
$nombreUsuario = $usuarioEmpleado['nombre_usuario'];
$usuario = $usuarioEmpleado['usuario'];
$idUsuario = $usuarioEmpleado['_id'];


$directorioActual = isset($_GET['directorio']) ? $_GET['directorio'] : $_SESSION['directorio_actual'];
$directorio = ObtenerDirectorio::obtenerDirectorio($directorioActual, $idUsuario );
if($directorio){
    $directorio = $directorio->getArrayCopy();
    $idDirectorioActual = $directorio['_id'];
}else{
    echo "No se encontró el directorio";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Nube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include 'menuEmpleado.php'; ?>
            <div class="col py-3">
                Content area...

                <!-- Modal -->
                <div class="modal fade" id="crearArchivoModal" tabindex="-1" aria-labelledby="crearArchivoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="crearArchivoModalLabel">Crear Nuevo Archivo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="crearArchivo.php" method="POST">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nombreArchivo" class="form-label">Nombre del Archivo</label>
                                        <input type="text" class="form-control" id="nombreArchivo" name="nombreArchivo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="extensionArchivo" class="form-label">Extensión del Archivo</label>
                                        <select class="form-select" id="extensionArchivo" name="extensionArchivo" required>
                                            <option value=".txt">.txt</option>
                                            <option value=".html">.html</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contenidoArchivo" class="form-label">Contenido del Archivo</label>
                                        <textarea class="form-control" id="contenidoArchivo" name="contenidoArchivo" rows="5" required></textarea>
                                    </div>
                                    <input type="hidden" name="directorioPadre" value="<?php echo $idDirectorioActual; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Archivo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>