<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="vistaEmpleado.php?directorio=raiz" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">+ Nuevo</span> </a>
                <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                    <li class="w-100">
                        <a href="#" class="nav-link px-0" data-bs-toggle="modal" data-bs-target="#crearArchivoModal">
                            <span class="d-none d-sm-inline">Nuevo Archivo</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0" data-bs-toggle="modal" data-bs-target="#crearDirectorioModal">
                            <span class="d-none d-sm-inline">Nuevo Directorio</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0" data-bs-toggle="modal" data-bs-target="#subirImagenModal">
                            <span class="d-none d-sm-inline">Subir Imagen</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="vistaAdministrador.php?directorio=raiz" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Mi Nube</span>
                </a>
            </li>

            <li>
                <a href="vistaCompartidoAdministrador.php" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Compartidos Conmigo</span> </a>
            </li>

            <li>
                <a href="vistaPapelera.php" class="nav-link px-0 align-middle">
                    <i class="fs-4 bi-trash"></i> <span class="ms-1 d-none d-sm-inline">Papelera</span> </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1"><?php echo $nombreUsuario; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../../controlador/autenticacion/CerrarSesion.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</div>