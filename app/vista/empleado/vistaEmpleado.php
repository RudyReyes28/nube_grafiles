<?php
require_once '../../modelo/empleado_dao/ObtenerDirectorio.php'; // Incluye la clase para obtener los directorios
require_once '../../modelo/empleado_dao/ArchivosDAO.php'; // Incluye la clase para obtener los archivos
session_start();

$usuarioEmpleado = $_SESSION['usuario'];
$nombreUsuario = $usuarioEmpleado['nombre_usuario'];
$usuario = $usuarioEmpleado['usuario'];
$idUsuario = $usuarioEmpleado['_id'];
$idDirectorioPadre = $_SESSION['id_directorio_padre'];
$idDirectorioActual = $_SESSION['id_directorio_actual'];

$directorioActual = isset($_GET['directorio']) ? $_GET['directorio'] : $_SESSION['directorio_actual'];
$_SESSION['directorio_actual'] = $directorioActual;
$directorio = null;
if ($directorioActual == 'raiz') {
    $directorio = ObtenerDirectorio::obtenerDirectorioRaiz($directorioActual, $idUsuario);
    $directorio = $directorio->getArrayCopy();
    $idDirectorioActual = $directorio['_id'];
}
// else {
//    echo "idDirectorioPadre: " . $idDirectorioPadre;
//    
//    $directorio = ObtenerDirectorio::obtenerDirectorioHijo($directorioActual, $idUsuario, $idDirectorioPadre);
//}

/*if ($directorio) {
    $directorio = $directorio->getArrayCopy();
    $idDirectorioActual = $directorio['_id'];
    $_SESSION['id_directorio_padre'] = $idDirectorioActual;
    //echo "Directorio actual: " . $directorio['nombre'];
    //echo "idDirectorioActual: " . $idDirectorioActual;
} else {
    echo "No se encontró el directorio";
}*/

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0a40091b96.js" crossorigin="anonymous"></script>
</head>

<body>


    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include 'menuEmpleado.php'; ?>
            <div class="col py-3">
                
                <div style="display: flex; align-items: center;">
                    <i class="fas fa-folder fa-2x"></i>
                    <h5 style="margin-left: 10px;"><?php echo $directorioActual; ?></h5>
                </div>
                
                
                <div class="row mt-2">
                    <!-- Mostrar Directorios -->
                    <?php foreach ($directoriosEmpleado as $directorioA) { ?>
                        <div class="col-sm-4 mb-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <!-- Icono de carpeta -->
                                    <i class="fas fa-folder fa-5x"></i>
                                    <h5 class="card-title mt-3"><?php echo $directorioA['nombre']; ?></h5>
                                    <form action="../../controlador/empleado/cambiarDirectorio.php" method="POST">
                                        <!-- Campos ocultos para enviar parámetros -->
                                        <input type="hidden" name="idDirectorio" value="<?php echo $directorioA['_id']; ?>">
                                        <input type="hidden" name="nombreDirectorio" value="<?php echo $directorioA['nombre']; ?>">
                                    
                                        <!-- Botón de enviar -->
                                        <button type="submit" class="btn btn-primary">Entrar</button>
                                    </form>
                                    <div class="dropdown mt-3">             <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $archivo['_id']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $directorioA['_id']; ?>">
                                            <li><a class="dropdown-item" href="#" data-id="<?php echo $directorioA['_id']; ?>" data-action="crear-copia">Crear Copia</a></li>
                                            <li><a class="dropdown-item" href="#" data-id="<?php echo $directorioA['_id']; ?>" data-action="mover">Mover</a></li>
                                            <li><a class="dropdown-item" href="#" data-id="<?php echo $directorioA['_id']; ?>" data-action="eliminar">Eliminar</a></li>
                                        </ul>
                                    </div>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#verArchivoModal" data-id="<?php echo $archivo['_id']; ?>"
                                        data-nombre="<?php echo $archivo['nombre']; ?>"
                                        data-extension="<?php echo $archivo['extension']; ?>"
                                        data-contenido="<?php echo htmlspecialchars($archivo['contenido']); ?>">
                                        <?php if (strpos($archivo['extension'], 'image') !== false) { ?>
                                            Ver Imagen
                                        <?php } else { ?>
                                            Ver Archivo
                                        <?php } ?>
                                    </button>
                                    <!-- Dropdown de opciones -->
                                    <div class="dropdown mt-3">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton<?php echo $archivo['_id']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo $archivo['_id']; ?>">
                                            <li><a class="dropdown-item" href="#" data-id="<?php echo $archivo['_id']; ?>" data-action="editar">Editar Archivo</a></li>
                                            <li><a class="dropdown-item" href="#" data-id="<?php echo $archivo['_id']; ?>" data-action="crear-copia">Crear Copia</a></li>
                                            <li><a class="dropdown-item" href="#" data-id="<?php echo $archivo['_id']; ?>" data-action="mover">Mover</a></li>
                                            <li><a class="dropdown-item" href="#" data-id="<?php echo $archivo['_id']; ?>" data-action="eliminar">Eliminar</a></li>
                                            <li><a class="dropdown-item" href="#" data-id="<?php echo $archivo['_id']; ?>" data-action="compartir">Compartir</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>


                <?php include 'modalEmpleado.php'; ?>

                
                


            </div>
        </div>
    </div>

    <script>
        // Capturamos los datos y cargamos el contenido en el modal al abrirlo
        var verArchivoModal = document.getElementById('verArchivoModal');
        verArchivoModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botón que abrió el modal
            var nombre = button.getAttribute('data-nombre');
            var extension = button.getAttribute('data-extension');
            var contenido = button.getAttribute('data-contenido');
            console.log('contenido: ' + contenido);

            // Cambiar el título del modal
            var modalTitle = verArchivoModal.querySelector('.modal-title');
            modalTitle.textContent = 'Ver Archivo: ' + nombre;

            // Cargar el contenido según el tipo de archivo
            var modalBodyContent = verArchivoModal.querySelector('#contenidoArchivo');
            if (extension.includes('image')) {
                // Mostrar imagen
                modalBodyContent.innerHTML = '<img src="../../controlador/empleado/' + contenido + '" class="img-fluid" alt="' + nombre + '">';
            } else if (extension === '.txt' || extension === '.html') {
            // Mostrar contenido de texto o HTML
            
                modalBodyContent.innerHTML = '<pre>' + contenido + '</pre>';
            } else {
                // Otras extensiones de archivo
                modalBodyContent.innerHTML = '<p>Tipo de archivo no soportado para vista previa.</p>';
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>