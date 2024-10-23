<!-- Modal nuevo archivo -->
<div class="modal fade" id="crearArchivoModal" tabindex="-1" aria-labelledby="crearArchivoModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="crearArchivoModalLabel">Crear Nuevo Archivo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="../../controlador/empleado/nuevoArchivo.php" method="POST">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nombreArchivo" class="form-label">Nombre del Archivo</label>
                                        <input type="text" class="form-control" id="nombreArchivo" name="nombreArchivo"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="extensionArchivo" class="form-label">Extensión del Archivo</label>
                                        <select class="form-select" id="extensionArchivo" name="extensionArchivo"
                                            required>
                                            <option value=".txt">.txt</option>
                                            <option value=".html">.html</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contenidoArchivo" class="form-label">Contenido del Archivo</label>
                                        <textarea class="form-control" id="contenidoArchivo" name="contenidoArchivo"
                                            rows="5" required></textarea>
                                    </div>
                                    <input type="hidden" name="idDirectorioPadre"
                                        value="<?php echo $idDirectorioActual; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Archivo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


<!-- Modal subir imagen -->
<div class="modal fade" id="subirImagenModal" tabindex="-1" aria-labelledby="subirImagenModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="subirImagenModalLabel">Subir Imagen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="../../controlador/empleado/subirImagen.php" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    <!-- Campo para seleccionar la imagen -->
                                    <div class="mb-3">
                                        <label for="archivoImagen" class="form-label">Seleccionar Imagen</label>
                                        <input type="file" class="form-control" id="archivoImagen" name="archivoImagen"
                                            accept="image/*" required>
                                    </div>
                                    <!-- Campo para el directorio padre oculto -->
                                    <input type="hidden" name="idDirectorioPadre"
                                        value="<?php echo $idDirectorioActual; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Subir Imagen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal nuevo directorio -->
                <div class="modal fade" id="crearDirectorioModal" tabindex="-1"
                    aria-labelledby="crearDirectorioModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="crearDirectorioModallLabel">Crear Nuevo Directorio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="../../controlador/empleado/nuevoDirectorio.php" method="POST">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nombreDirectorio" class="form-label">Nombre del Directorio</label>
                                        <input type="text" class="form-control" id="nombreDirectorio"
                                            name="nombreDirectorio" required>
                                    </div>

                                    <input type="hidden" name="idDirectorioPadre"
                                        value="<?php echo $idDirectorioActual; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Directorio</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

<!-- Modal Genérico -->
<div class="modal fade" id="verArchivoModal" tabindex="-1" aria-labelledby="verArchivoModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="verArchivoModalLabel">Ver Archivo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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

