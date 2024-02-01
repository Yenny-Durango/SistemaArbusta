<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Borra la cookie de la sesión si está presente
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio de sesión
header("Location: login.php");
exit();
