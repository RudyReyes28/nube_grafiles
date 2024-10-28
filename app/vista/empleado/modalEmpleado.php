<!-- Modal nuevo archivo -->
<div class="modal fade" id="crearArchivoModal" tabindex="-1" aria-labelledby="crearArchivoModalLabel"
    aria-hidden="true">
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
                        <textarea class="form-control" id="contenidoArchivo" name="contenidoArchivo" rows="5"
                            required></textarea>
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
                        <input type="file" class="form-control" id="archivoImagen" name="archivoImagen" accept="image/*"
                            required>
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
<div class="modal fade" id="crearDirectorioModal" tabindex="-1" aria-labelledby="crearDirectorioModalLabel"
    aria-hidden="true">
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

<!-- Modal Genérico -->
<div class="modal fade" id="verArchivoModal" tabindex="-1" aria-labelledby="verArchivoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verArchivoModalLabel">Ver Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Aquí cargamos el contenido del archivo -->
                <div id="contenidoArchivo"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Editar Archivo -->
<div class="modal fade" id="editarArchivoModal" tabindex="-1" aria-labelledby="editarArchivoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarArchivoModalLabel">Editar Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarArchivoForm" action="../../controlador/empleado/editarArchivos.php" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" id="archivoId" name="archivoId">
                    <div class="mb-3">
                        <label for="nombreArchivo" class="form-label">Nombre del Archivo</label>
                        <input type="text" class="form-control" id="nombreArchivo" name="nombreArchivo" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="contenidoArchivo" class="form-label">Contenido</label>
                        <textarea class="form-control" id="contenidoArchivo" name="contenidoArchivo"
                            rows="5"></textarea>
                    </div>
                    <div class="mb-3" id="reemplazarImagenDiv" style="display:none;">
                        <label for="reemplazarImagen" class="form-label">Reemplazar Imagen</label>
                        <input type="file" class="form-control" id="reemplazarImagen" name="reemplazarImagen"
                            accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Mover Archivo -->
<div class="modal fade" id="moverArchivoModal" tabindex="-1" aria-labelledby="moverArchivoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="moverArchivoModalLabel">Mover Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="moverArchivoForm" action="../../controlador/empleado/moverArchivo.php" method="POST">
                    <input type="hidden" id="archivoIdMov" name="archivoIdMov">
                    <div class="mb-3">
                        <label for="nombreArchivoMov" class="form-label">Archivo:</label>
                        <input type="text" class="form-control" id="nombreArchivoMov" name="nombreArchivoMov" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="directorioDestino" class="form-label">Selecciona el directorio de destino:</label>
                        <select class="form-select" id="directorioDestino" name="directorioDestino">
                            <?php
                                foreach ($todosLosDirectoriosEmpleado as $directorio) {
                                    echo '<option value="' . $directorio['_id'] . '">' . $directorio['nombre'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mover Archivo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Formulario oculto para crear copia -->
<form id="createCopyForm" action="../../controlador/empleado/crearCopia.php" method="POST" style="display: none;">
    <input type="hidden" name="archivoId" id="archivoIdCopia">
    <input type="hidden" name="nombreArchivo" id="nombreArchivoCopia">
    <input type="hidden" name="contenidoArchivo" id="contenidoArchivoCopia">
    <input type="hidden" name="extensionArchivo" id="extensionArchivoCopia">
    <input type="hidden" name="idDirectorioPadre" id="idDirectorioPadre">
    <input type="hidden" name="idUsuario" id="idUsuario">
</form>

<!-- Modal para Eliminar Archivo -->
<div class="modal fade" id="eliminarArchivoModal" tabindex="-1" aria-labelledby="eliminarArchivoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarArchivoModalLabel">Eliminar Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="eliminarArchivoForm" action="../../controlador/empleado/eliminarArchivo.php" method="POST">
                    <input type="hidden" id="archivoIdElim" name="archivoIdElim">
                    <div class="mb-3">
                        <label for="nombreArchivoElim" class="form-label">Archivo:</label>
                        <input type="text" class="form-control" id="nombreArchivoElim" name="nombreArchivoElim" readonly>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Eliminar Archivo</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal para Compartir Archivo -->
<div class="modal fade" id="compartirArchivoModal" tabindex="-1" aria-labelledby="compartirArchivoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="compartirArchivoModalLabel">Compartir Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="compartirArchivoForm" action="../../controlador/empleado/compartirArchivo.php" method="POST">
                    <input type="hidden" id="contenidoArchivoComp" name="contenidoArchivoComp">
                    <input type="hidden" id="extensionArchivoComp" name="extensionArchivoComp">
                    <input type="hidden" id="idUsuarioComp" name="idUsuarioComp">
                    
                    <div class="mb-3">
                        <label for="nombreArchivoComp" class="form-label">Archivo:</label>
                        <input type="text" class="form-control" id="nombreArchivoComp" name="nombreArchivoComp" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="idUsuarioCompartido" class="form-label">Selecciona el usuario a compartir:</label>
                        <select class="form-select" id="idUsuarioCompartido" name="idUsuarioCompartido">
                            <?php
                                foreach ($todosLosUsuarios as $usuarioC) {
                                    echo '<option value="' . $usuarioC['_id'] . '">' . $usuarioC['nombre_usuario'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Compartir Archivo</button>
                </form>
            </div>
        </div>
    </div>
</div>