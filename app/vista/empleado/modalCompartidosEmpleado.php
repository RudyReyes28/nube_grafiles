<!-- Modal para Eliminar Archivo -->
<div class="modal fade" id="eliminarArchivoModal" tabindex="-1" aria-labelledby="eliminarArchivoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarArchivoModalLabel">Eliminar Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="eliminarArchivoForm" action="../../controlador/empleado/eliminarArchivoCompartido.php" method="POST">
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