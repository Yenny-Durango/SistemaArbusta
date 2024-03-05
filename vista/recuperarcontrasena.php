
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="sitio arbusta" />
    <meta name="author" content="Yenny Durango" />
    <title>ARBUSTA</title>
    <link href="partials/assets/css/styles-formularios.css" rel="stylesheet" />
    <link rel="shortcut icon" href="partials/assets/img/logo.png" type="image/x-icon">
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
                                    <h3 class="text-center font-weight-light my-4">Recuperar contraseña</h3>
                                </div>
                                <div class="card-body">
                                    <p style="text-align: center;">Te enviaremos un email a tu correo arbusta para que puedas recuperar la contraseña</p>
                                    <form method="post" action="" id="form-login">
                                        <input type="hidden" name="token" id="token" value="">
                                        <input type="hidden" name="action" id="action" value="">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="correo" name="correo" type="email" placeholder="name@arbusta.net" onkeyup="ValidarCorreoRecuperarContrasena(this)" />
                                            <label for="correo">Correo</label>
                                            <span id="CorreoError" class="alert alert-danger" hidden></span>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="BotonRecuperarContrasena" onclick="RecuperarContrasena()" disabled>Ingresar</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <a class="text-primary" href="registro.php">¿Necesitas una cuenta? ¡Regístrate!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- script -->
    <script src="./partials/assets/js/usuario.js"></script>
    <script src="./partials/assets/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>