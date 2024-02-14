<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Configuración del conjunto de caracteres y compatibilidad con navegadores -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Metadatos para descripción del sitio y autor -->
    <meta name="description" content="sitio arbusta" />
    <meta name="author" content="Yenny Durango" />
    <!-- Título de la página -->
    <title>ARBUSTA</title>
    <!-- Enlace al estilo de Simple Datatables -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- Enlace al archivo de estilos personalizados para formularios -->
    <link href="./css/styles-formularios.css" rel="stylesheet" />
    <!-- Icono del sitio -->
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <!-- Script para cargar Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>


<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <!-- Encabezado del formulario -->
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Crear cuenta</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Formulario de registro -->
                                    <form method="POST" action="">
                                        <!-- Sección de datos personales -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <!-- Campo para el nombre -->
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="nombre" onkeyup="ValidarNombreUsuarioR(this)" />
                                                    <label for="nombre">Nombres</label>
                                                </div>
                                                <span id="nombreError" class="alert alert-danger" hidden></span>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Campo para el apellido -->
                                                <div class="form-floating">
                                                    <input class="form-control" id="apellido" name="apellido" type="text" placeholder="apellido" onkeyup="ValidarApellidoUsuarioR(this)" />
                                                    <label for="apellido">Apellido</label>
                                                </div>
                                                <span id="apellidoError" class="alert alert-danger" hidden></span>
                                            </div>
                                        </div>
                                        <!-- Sección de contacto -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <!-- Campo para el correo electrónico -->
                                                <div class="form-floating">
                                                    <input class="form-control" id="correo" name="correo" type="email" placeholder="name@arbusta.net" onkeyup="ValidarCorreoUsuarioR(this)" />
                                                    <label for="correo">Correo</label>
                                                </div>
                                                <span id="correoError" class="alert alert-danger" hidden></span>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Campo para el teléfono -->
                                                <div class="form-floating">
                                                    <input class="form-control" id="telefono" name="telefono" type="number" placeholder="telefono" onkeyup="ValidarTelefonoUsuarioR(this)" />
                                                    <label for="Teléfono (Opcional)">Teléfono (Opcional)</label>
                                                </div>
                                                <span id="telefonoError" class="alert alert-danger" hidden></span>
                                            </div>
                                        </div>
                                        <!-- Sección de contraseña -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <!-- Campo para la contraseña -->
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="contrasena" name="contrasena" type="password" placeholder="contrasena" onkeyup="ValidarContrasenaUsuarioR(this)" />
                                                    <label for="Contraseña">Contraseña</label>
                                                </div>
                                                <span id="contrasenaError" class="alert alert-danger" hidden></span>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Campo para confirmar la contraseña -->
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" type="password" placeholder="confirmar contraseña" onkeyup="ValidarConfimarContrasenaUsuarioR(this)" />
                                                    <label for="Confirmar contraseña">Confirmar contraseña</label>
                                                </div>
                                                <span id="confirmarContrasenaError" class="alert alert-danger" hidden></span>
                                            </div>
                                        </div>
                                        <!-- Botón para mostrar/ocultar la contraseña -->
                                        <span id="verContrasena" class="text-primary" title="Ver contraseña" onclick="mostrarContrasena()">Ver contraseña</span>
                                        <!-- Botón para enviar el formulario de registro -->
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" id="submitButton" value="guardar" class="btn btn-primary" onclick="RegistrarUsuario()">Crear cuenta</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Enlace para iniciar sesión si ya tienes una cuenta -->
                                <div class="card-footer text-center py-3">
                                    <a class="text-primary" href="login.php">¿Tienes una cuenta? Inicia sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Only load necessary scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src=partials/js/jquery-3.7.1.min.js"></script>
    <script src="partials/js/scripts.js"></script>
    <script src="partials/js/equipo.js"></script>
    <script src="partials/js/ticket.js"></script>
    <script src="partials/js/usuario.js"></script>
    <script src="partials/js/firmail.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/84339ecbcb.js" crossorigin="anonymous"></script>

</html>