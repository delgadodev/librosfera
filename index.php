<?php

include 'clases/Vista.php';
include "./clases/Libro.php";
include "./clases/Conexion.php";

session_start();

$email = "";

if(isset($_SESSION["email"
])){
    $email = $_SESSION["email"];
   
}

$vista = new Vista();
$vista->set("email" , $email);
$vista->render('vistas/index.php');
