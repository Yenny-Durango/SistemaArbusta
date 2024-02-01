<?php
// Inicia la sesión
session_start();

// Elimina todas las variables de sesión
$_SESSION = array();

// Si se utiliza cookies de sesión, elimina la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio de sesión
header("Location: ../vista/login.php");
exit;
