<?php

include 'clases/Conexion.php';
include 'clases/Vista.php';

session_start();


$vista = new Vista();
$vista->set("email", $_SESSION["email"]);
$vista->render('vistas/prestamos.php');
