<!-- Modal para Eliminar Directorio -->
<div class="modal fade" id="eliminarDirectorioModal" tabindex="-1" aria-labelledby="eliminarDirectorioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarDirectorioModalLabel">Eliminar Directorio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="eliminarArchivoForm" action="../../controlador/empleado/eliminarDirectorio.php" method="POST">
                    <input type="hidden" id="directorioIdElim" name="directorioIdElim">
                    <div class="mb-3">
                        <label for="nombreDirectorioElim" class="form-label">Directorio:</label>
                        <input type="text" class="form-control" id="nombreDirectorioElim" name="nombreDirectorioElim" readonly>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Eliminar Directorio</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Mover Directorio -->
<div class="modal fade" id="moverDirectorioModal" tabindex="-1" aria-labelledby="moverDirectorioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="moverDirectorioModalLabel">Mover Directorio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="moverDirectorioForm" action="../../controlador/empleado/moverDirectorio.php" method="POST">
                    <input type="hidden" id="directorioIdMov" name="directorioIdMov">
                    <div class="mb-3">
                        <label for="nombreDirectorioMov" class="form-label">Directorio:</label>
                        <input type="text" class="form-control" id="nombreDirectorioMov" name="nombreDirectorioMov" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="directorioDestinoDir" class="form-label">Selecciona el directorio de destino:</label>
                        <select class="form-select" id="directorioDestinoDir" name="directorioDestinoDir">
                            <?php
                                foreach ($todosLosDirectoriosMover as $directorioMov) {
                                    echo '<option value="' . $directorioMov['_id'] . '">' . $directorioMov['nombre'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mover Directorio</button>
                </form>
            </div>
        </div>
    </div>
</div>