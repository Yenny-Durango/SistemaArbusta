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
	<meta name="description" content="sitio arbusta" />
	<meta name="author" content="Yenny Durango" />
	<title>ARBUSTA</title>
	<link href="partials/assets/css/styles.css" rel="stylesheet" />
	<link rel="shortcut icon" href="partials/assets/img/logo.png" type="image/x-icon">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="principal_administrador.php"><img src="partials/assets/img/image.webp" alt="" style="width: 100px;"></a>
		<!-- Sidebar Toggle-->
		<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
		<!-- Navbar-->
		<ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $name; ?></a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="#!">Configuración</a></li>
					<li>
						<hr class="dropdown-divider" />
					</li>
					<li><a class="dropdown-item" href="../cerrar_sesion.php">Cerrar sesión</a></li>
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
						<a class="nav-link" href="principal_administrador.php">
							<div class="sb-nav-link-icon"><i class="fa-solid fa-house-user"></i></div>
							Inicio
						</a>
						<div class="sb-sidenav-menu-heading">Interface</div>
						<!-- CRUD EQUIPOS -->
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEquipos" aria-expanded="false" aria-controls="collapseEquipos">
							<div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
							Equipos
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseEquipos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="partials/registrar_equipo.php">
									<div class="sb-nav-link-icon"><i class="fa-solid fa-keyboard"></i></div>
									Nuevo equipo
								</a>
								<a class="nav-link" href="partials/listar_equipos.php">
									<div class="sb-nav-link-icon"><i class="fa-solid fa-computer"></i></div>
									Listar equipos
								</a>
							</nav>
						</div>

						<!-- CRUD USUARIOS -->
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
							<div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear"></i></div>
							Usuarios
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseUsuarios" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="partials/registrar_usuario.php">
									<div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
									Nuevo usuario
								</a>
								<a class="nav-link" href="partials/listar_usuarios.php">
									<div class="sb-nav-link-icon"><i class="fa-solid fa-users-gear"></i></div>
									Listar usuarios
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
				<center>
					<div class="sb-sidenav-footer">
						<b>Conectado como:</b>
						<?php echo $name; ?>
					</div>
				</center>
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
		</div>
	</div>

	<!-- Only load necessary scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src=partials/assets/js/jquery-3.7.1.min.js"></script>
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