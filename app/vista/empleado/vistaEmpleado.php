<?php
require_once '../../modelo/empleado_dao/ObtenerDirectorio.php'; // Incluye la clase para obtener los directorios
require_once '../../modelo/empleado_dao/ArchivosDAO.php'; // Incluye la clase para obtener los archivos
session_start();

$usuarioEmpleado = $_SESSION['usuario'];
$nombreUsuario = $usuarioEmpleado['nombre_usuario'];
$usuario = $usuarioEmpleado['usuario'];
$idUsuario = $usuarioEmpleado['_id'];
$idDirectorioPadre = $_SESSION['id_directorio_padre'];


$directorioActual = isset($_GET['directorio']) ? $_GET['directorio'] : $_SESSION['directorio_actual'];
$_SESSION['directorio_actual'] = $directorioActual;
$directorio = null;
if ($directorioActual == 'raiz') {
    $directorio = ObtenerDirectorio::obtenerDirectorioRaiz($directorioActual, $idUsuario);
} else {
    $directorio = ObtenerDirectorio::obtenerDirectorioHijo($directorioActual, $idUsuario, $idDirectorioPadre);
}

if ($directorio) {
    $directorio = $directorio->getArrayCopy();
    $idDirectorioActual = $directorio['_id'];
    $_SESSION['id_directorio_padre'] = $idDirectorioActual;
    //echo "Directorio actual: " . $directorio['nombre'];
    //echo "idDirectorioActual: " . $idDirectorioActual;
} else {
    echo "No se encontró el directorio";
}

//aqui debemos obtener los archivos
$archivosEmpleado = ArchivosDAO::obtenerArchivos($idDirectorioActual);
//aqui obtemos los directorios
$directoriosEmpleado = ObtenerDirectorio::obtenerDirectoriosHijos($idDirectorioActual);

//print_r($idDirectorioActual);
//print_r($directoriosEmpleado);
//print_r($archivosEmpleado);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Nube</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0a40091b96.js" crossorigin="anonymous"></script>
</head>

<body>


    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include 'menuEmpleado.php'; ?>
            <div class="col py-3">

                <div class="row">
                    <!-- Mostrar Directorios -->
                    <?php foreach ($directoriosEmpleado as $directorioA) { ?>
                        <div class="col-sm-4 mb-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <!-- Icono de carpeta -->
                                    <i class="fas fa-folder fa-5x"></i>
                                    <h5 class="card-title mt-3"><?php echo $directorioA['nombre']; ?></h5>
                                    <a href="#" class="btn btn-primary">Entrar</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Mostrar Archivos -->
                    <?php foreach ($archivosEmpleado as $archivo) { ?>
                        <div class="col-sm-4 mb-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <!-- Icono según tipo de archivo -->
                                    <?php if (strpos($archivo['extension'], 'image') !== false) { ?>
                                        <i class="fas fa-file-image fa-5x"></i>
                                    <?php } else if ($archivo['extension'] === '.txt') { ?>
                                        <i class="fas fa-file-alt fa-5x"></i>
                                    <?php } else if ($archivo['extension'] === '.html') { ?>
                                        <i class="fas fa-file-code fa-5x"></i>
                                    <?php } else { ?>
                                        <i class="fas fa-file fa-5x"></i>
                                    <?php } ?>

                                    <h5 class="card-title mt-3"><?php echo $archivo['nombre']; ?></h5>

                                    <!-- Botón para ver archivo o abrir imagen -->
                                    <?php if (strpos($archivo['extension'], 'image') !== false) { ?>
                                        <a href="<?php echo $archivo['contenido']; ?>" target="_blank" class="btn btn-primary">Ver Imagen</a>
                                    <?php } else { ?>
                                        <a href="verArchivo.php?id=<?php echo $archivo['_id']; ?>" target="_blank" class="btn btn-primary">Ver Archivo</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                Content area...

                <!-- Modal nuevo archivo -->
                <div class="modal fade" id="crearArchivoModal" tabindex="-1" aria-labelledby="crearArchivoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="crearArchivoModalLabel">Crear Nuevo Archivo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../../controlador/empleado/nuevoArchivo.php" method="POST">
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
                                    <input type="hidden" name="idDirectorioPadre" value="<?php echo $idDirectorioActual; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Archivo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal subir imagen -->
                <div class="modal fade" id="subirImagenModal" tabindex="-1" aria-labelledby="subirImagenModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="subirImagenModalLabel">Subir Imagen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../../controlador/empleado/subirImagen.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- Campo para seleccionar la imagen -->
                                    <div class="mb-3">
                                        <label for="archivoImagen" class="form-label">Seleccionar Imagen</label>
                                        <input type="file" class="form-control" id="archivoImagen" name="archivoImagen" accept="image/*" required>
                                    </div>
                                    <!-- Campo para el directorio padre oculto -->
                                    <input type="hidden" name="idDirectorioPadre" value="<?php echo $idDirectorioActual; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Subir Imagen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal nuevo directorio -->
                <div class="modal fade" id="crearDirectorioModal" tabindex="-1" aria-labelledby="crearDirectorioModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="crearDirectorioModallLabel">Crear Nuevo Directorio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../../controlador/empleado/nuevoDirectorio.php" method="POST">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nombreDirectorio" class="form-label">Nombre del Directorio</label>
                                        <input type="text" class="form-control" id="nombreDirectorio" name="nombreDirectorio" required>
                                    </div>

                                    <input type="hidden" name="idDirectorioPadre" value="<?php echo $idDirectorioActual; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Directorio</button>
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