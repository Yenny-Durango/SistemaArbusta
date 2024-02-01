<?php
$dsn = "mysql:host=localhost;dbname=sistema";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM usuario");
    $usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);

    // print_r($usuarios);
} catch (PDOException $e) {
    die("CONEXIÓN FALLIDA: " . $e->getMessage());
}