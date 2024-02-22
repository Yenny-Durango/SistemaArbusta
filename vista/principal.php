<?php
session_start();
$name = $_SESSION['nombre_completo'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sitio Arbusta" /> <!-- Corregí la ortografía de "sitio" -->
    <meta name="author" content="Yenny Durango" />
    <title>ARBUSTA</title>
    <link href="./partials/assets/css/styles.css" rel="stylesheet" />
    <!-- <link href="./partials/assets/css/styles-copy.css" rel="stylesheet" /> -->
    <link rel="shortcut icon" href="./partials/assets/img/logo.png" type="image/x-icon">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand -->
        <a class="navbar-brand ps-3" href="principal.php"><img src="partials/assets/img/image.webp" alt="" style="width: 100px;"></a>
        <!-- Sidebar Toggle -->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar -->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $name; ?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Configuración</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="principal.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house-user"></i></div>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>

                        <!-- EQUIPO -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEquipo" aria-expanded="false" aria-controls="collapseEquipo">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
                            Equipo
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseEquipo" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="partials/equipo.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
                                    Mi Equipo
                                </a>
                                <a class="nav-link" href="partials/informacionproducto.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
                                    Info Producto
                                </a>
                                <a class="nav-link" href="partials/datostecnicos.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
                                    Datos Técnicos
                                </a>
                            </nav>
                        </div>

                        <!-- TICKETS -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTicket" aria-expanded="false" aria-controls="collapseTicket">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-ticket"></i></div>
                            Tickets
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseTicket" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="partials/registrar_ticket.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-ticket"></i></div>
                                    Crear Ticket
                                </a>
                                <a class="nav-link" href="partials/listar_tickets.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-ticket"></i></div>
                                    Mis Tickets
                                </a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">Firma Arbusta</div>
                        <!-- FIRMA -->
                        <a class="nav-link" href="partials/firma.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-signature"></i></div>
                            Firma
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Conectado como:</div>
                    <?php echo $name; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="container" id="qCarga">
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Bienvenido/a <?php echo $name; ?></h5>
                                <hr>
                                <p class="card-subtitle">La única forma de hacer un gran trabajo es amar lo que haces</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; ARBUSTA 2024</div>
                        <div>
                            <a href="#">Política de privacidad</a>
                            &middot;
                            <a href="#">Términos &amp; Condiciones</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Only load necessary scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="partials/assets/js/jquery-3.7.1.min.js"></script>
    <script src="partials/assets/js/scripts.js"></script>
    <script src="partials/assets/js/equipo.js"></script>
    <script src="partials/assets/js/ticket.js"></script>
    <script src="partials/assets/js/usuario.js"></script>
    <script src="partials/assets/js/firmail.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/84339ecbcb.js" crossorigin="anonymous"></script>
</body>

</html>