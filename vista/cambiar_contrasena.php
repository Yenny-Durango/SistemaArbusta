<?php
require '../modelo/conexion.php';
require '../controlador/usuario.controlador.php';

if(empty($_GET['id_usuario'])){
    header( "location: login.php"); 
}

if(empty($_GET['token'])){
    header( "location: login.php"); 
}

$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';
