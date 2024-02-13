<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Configuración del documento -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Metadatos del sitio -->
    <meta name="description" content="sitio arbusta" />
    <meta name="author" content="Yenny Durango" />

    <!-- Título de la página -->
    <title>ARBUSTA</title>

    <!-- Enlace a la hoja de estilos para tablas simples -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <!-- Enlace a la hoja de estilos personalizada para formularios -->
    <link href="./assets/css/styles-formularios.css" rel="stylesheet" />

    <!-- Ícono del sitio (favicon) -->
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">

    <!-- Inclusión del script de FontAwesome para íconos -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Inclusión del script de reCAPTCHA de Google para validación -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <!-- Contenedor principal -->
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Tarjeta de inicio de sesión -->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <!-- Encabezado de la tarjeta -->
                                    <h3 class="text-center font-weight-light my-4">Iniciar sesión</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Formulario de inicio de sesión -->
                                    <form method="post" action="">
                                        <!-- Campo para el correo electrónico -->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="correo" name="correo" type="email" placeholder="name@arbusta.net" onkeyup="ValidarCorreoUsuario(this)" />
                                            <label for="correo">Correo</label>
                                            <span id="correoError" class="alert alert-danger" hidden></span>
                                        </div>
                                        <!-- Campo para la contraseña -->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="contrasena" name="contrasena" type="password" placeholder="Password" onkeyup="ValidarContrasenaUsuario(this)" />
                                            <label for="contrasena">Contraseña</label>
                                            <span id="contrasenaError" class="alert alert-danger" hidden></span>
                                            <!-- Botón para mostrar/ocultar la contraseña -->
                                            <span id="verContrasena" class="text-primary" title="Ver contraseña" onclick="mostrarContrasenaL()">Ver contraseña
                                            </span>
                                        </div>
                                        <!-- Recaptcha para validación -->
                                        <center>
                                            <div class="card-body">
                                                <div class="g-recaptcha" data-sitekey="6LdiYFYpAAAAAC5XMkW1T2S0km6SLOmOFqJ7AGc_"></div>
                                            </div>
                                            <!-- Botón para enviar el formulario de inicio de sesión -->
                                            <button type="submit" class="btn btn-primary" id="submitButton" onclick="Ingresar()">Ingresar</button>
                                        </center>
                                    </form>
                                </div>
                                <!-- Enlaces para recuperar contraseña y registro -->
                                <div class="card-footer text-center py-3">
                                    <a class="text-primary" href="recuperarcontrasena.php">¿Olvidaste tu contraseña?</a>
                                    <a class="text-primary" href="registro.php">¿Necesitas una cuenta? ¡Regístrate!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Only load necessary scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script type="text/javascript" src="./assets/js/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/scripts.js"></script>
    <script src="./assets/js/usuario.js"></script>
    <script src="./assets/js/equipo.js"></script>
    <script src="./assets/js/ticket.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/84339ecbcb.js" crossorigin="anonymous"></script>
</body>

</html>