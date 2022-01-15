    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Inicio</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(isset($_SESSION['token'])){ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Perfil
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../services/person_service.php?cui=<?php echo $_SESSION['cui'] ?>&action=one">Ver perfil</a></li>
                                <li><a class="dropdown-item" href="../services/logout.php">Cerrar Sesión</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><?php echo $_SESSION['username'] ?></a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Perfil
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Iniciar sesión</a></li>
                                <li><a class="dropdown-item" href="person_form.php">Crear usuario</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Areas de desempeño
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="performance_area_form.php">Crear una nueva area</a></li>
                            <li><a class="dropdown-item" href="../services/performance_area_service.php?action=all">Ver listado de areas creadas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Instituciones academicas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="institution_form.php">Crear una nueva institución</a></li>
                            <li><a class="dropdown-item" href="../services/institution_service.php?action=all">Ver listado de instituciones creadas</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action='../services/reports_service.php' method='GET'>
                    <select class="form-select" aria-label="Default select example" name='report_option'>
                        <option selected value='0'>Selecciona una vista</option>
                        <option value="1">Ver reporte de personas</option>
                        <option value="2">Ver reporte de areas de desempeño</option>
                    </select>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>