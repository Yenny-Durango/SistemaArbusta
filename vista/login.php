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
    <script src="https://www.google.com/recaptcha/api.js?render=6LcytIApAAAAAJYRNKAF03_NL9EZKbQVITW7IkiE"></script>
    <script type="text/javascript" src="./partials/assets/js/jquery-3.7.1.min.js"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Iniciar sesión</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="" id="form-login">
                                        <input type="hidden" name="token" id="token" value="">
                                        <input type="hidden" name="action" id="action" value="">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="correo" name="correo" type="email" placeholder="name@arbusta.net" onkeyup="ValidarCorreoLogin(this)" />
                                            <label for="correo">Correo</label>
                                            <span id="CorreoError" class="alert alert-danger" hidden></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="contrasena" name="contrasena" type="password" placeholder="Password" onkeyup="ValidarContrasenaLogin(this)" />
                                            <label for="contrasena">Contraseña</label>
                                            <span id="ContrasenaError" class="alert alert-danger" hidden></span>
                                            <span id="VerContrasena" class="text-primary" title="Ver contraseña" onclick="MostrarContrasenaLogin()">Ver contraseña
                                            </span>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="BotonEnviarLogin" onclick="Ingresar()" disabled>Ingresar</button>
                                    </form>
                                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./partials/assets/js/scripts.js"></script>
    <script src="./partials/assets/js/usuario.js"></script>
    <script src="./partials/assets/js/equipo.js"></script>
    <script src="./partials/assets/js/ticket.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/84339ecbcb.js" crossorigin="anonymous"></script>
</body>

</html>