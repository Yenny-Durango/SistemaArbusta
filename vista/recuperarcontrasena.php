<?php
// Incluye el archivo de conexión a la base de datos
require "../modelo/conexion.php";

// Verifica si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén el correo electrónico ingresado
    $correo = $_POST["correo"];

    try {
        // Crea una conexión PDO
        $conn = new PDO("mysql:host=localhost;dbname=sistema", "root", "");

        // Establece el modo de error para excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifica si el correo electrónico existe en la base de datos
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE correo = :correo");
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Genera un token único para la recuperación de contraseña
            $token = bin2hex(random_bytes(16));

            // Actualiza la base de datos con el token
            $update_sql = "UPDATE usuario SET token = :token WHERE correo = :correo";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bindParam(':token', $token);
            $update_stmt->bindParam(':correo', $correo);
            $update_stmt->execute();

            // Envía un correo electrónico con el enlace de recuperación
            $mensaje = "Haz clic en el siguiente enlace para restablecer tu contraseña: \n\n";
            $mensaje .= "http://tu_sitio/recuperar_contraseña.php?token=$token";

            // Puedes utilizar la función mail() para enviar el correo electrónico
            // mail($correo, "Recuperación de contraseña", $mensaje);

            echo "Se ha enviado un enlace de recuperación a tu correo electrónico.";
        } else {
            echo "No se encontró ningún usuario con ese correo electrónico.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cierra la conexión PDO
        $conn = null;
    }
}
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
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="./assets/css/styles-formularios.css" rel="stylesheet" />
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <!-- Contenedor principal -->
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Tarjeta de recuperación de contraseña -->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <!-- Encabezado de la tarjeta -->
                                    <h3 class="text-center font-weight-light my-4">Recuperar contraseña</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Mensaje informativo -->
                                    <div class="small mb-3 text-muted">Ingresa tu correo electrónico y nosotros te enviaremos un correo para recuperar tu contraseña</div>
                                    <!-- Formulario de recuperación de contraseña -->
                                    <form method="post" action="recuperarcontrasena.php">
                                        <div class="form-floating mb-3">
                                            <!-- Campo para el correo electrónico -->
                                            <input class="form-control" id="correo" name="correo" type="email" placeholder="correo@arbusta.net" />
                                            <label for="correo">Correo</label>
                                        </div>
                                        <!-- Enlaces para volver al Login y enviar la solicitud de recuperación -->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="text-primary" href="login.php">Volver al Login</a>
                                            <button type="submit" class="btn btn-primary">Continuar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Enlace para registro -->
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

    <!-- Only load necessary scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/scripts.js"></script>
    <script src="./assets/js/equipo.js"></script>
    <script src="./assets/js/ticket.js"></script>
    <script src="./assets/js/usuario.js"></script>
    <script src="./assets/js/firmail.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/84339ecbcb.js" crossorigin="anonymous"></script>
    
</body>

</html>