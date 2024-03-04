<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="sitio arbusta" />
    <meta name="author" content="Yenny Durango" />
    <title>ARBUSTA</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="partials/assets/css/styles-formularios.css" rel="stylesheet" />
    <link rel="shortcut icon" href="partials/assets/img/logo.png" type="image/x-icon">
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
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Crear cuenta</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="nombre" onkeyup="ValidarNombreRegistro(this)" />
                                                    <label for="nombre">Nombres</label>
                                                </div>
                                                <span id="NombreError" class="alert alert-danger" hidden></span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="apellido" name="apellido" type="text" placeholder="apellido" onkeyup="ValidarApellidoRegistro(this)" />
                                                    <label for="apellido">Apellido</label>
                                                </div>
                                                <span id="ApellidoError" class="alert alert-danger" hidden></span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="correo" name="correo" type="email" placeholder="name@arbusta.net" onkeyup="ValidarCorreoRegistro(this)" />
                                                    <label for="correo">Correo</label>
                                                </div>
                                                <span id="CorreoError" class="alert alert-danger" hidden></span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="telefono" name="telefono" type="number" placeholder="telefono" onkeyup="ValidarTelefonoRegistro(this)" />
                                                    <label for="Teléfono (Opcional)">Teléfono (Opcional)</label>
                                                </div>
                                                <span id="TelefonoError" class="alert alert-danger" hidden></span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="contrasena" name="contrasena" type="password" placeholder="contrasena" onkeyup="ValidarContrasenaRegistro(this)" />
                                                    <label for="Contraseña">Contraseña</label>
                                                </div>
                                                <span id="ContrasenaError" class="alert alert-danger" hidden></span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" type="password" placeholder="confirmar contraseña" onkeyup="ValidarConfimarContrasenaRegistro(this)" />
                                                    <label for="Confirmar contraseña">Confirmar contraseña</label>
                                                </div>
                                                <span id="ConfirmarContrasenaError" class="alert alert-danger" hidden></span>
                                            </div>
                                        </div>
                                        <span id="VerContrasena" class="text-primary" title="Ver contraseña" onclick="MostrarContrasenaRegistro()">Ver contraseña</span>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" id="BotonEnviarRegistro" value="guardar" class="btn btn-primary" onclick="RegistrarUsuario()" disabled>Crear cuenta</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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

</html>