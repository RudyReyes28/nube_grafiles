<div class="modal fade" id="nuevoTrabajadorModal" tabindex="-1" aria-labelledby="nuevoTrabajadorModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoTrabajadorModal">Nuevo Trabajador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../controlador/administrador/nuevoEmpleado.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombreEmpleado" class="form-label">Nombre del Empleado</label>
                        <input type="text" class="form-control" id="nombreEmpleado" name="nombreEmpleado" required>
                    </div>
                    <div class="mb-3">
                        <label for="correoEmpleado" class="form-label">Correo del Empleado</label>
                        <input type="email" class="form-control" id="correoEmpleado" name="correoEmpleado" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombreEmpleado" class="form-label">Usuario del Empleado</label>
                        <input type="text" class="form-control" id="usuarioEmpleado" name="usuarioEmpleado" required>
                    </div>
                    <div class="mb-3">
                        <label for="contraseniaEmpleado" class="form-label">Contrasenia del Empleado</label>
                        <input type="password" class="form-control" id="contraseniaEmpleado" name="contraseniaEmpleado" required>
                    </div>
                    
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear Empleado</button>
                </div>
            </form>
        </div>
    </div>
</div>