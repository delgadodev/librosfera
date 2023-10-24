<?php
include '../clases/Vista.php';
include "../clases/Conexion.php";
include "../clases/Usuario.php";

$nombre ="";
$apellido ="";
$email ="";
$password ="";
$telefono ="";
$msg ="";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $telefono = $_POST["telefono"];

    $usuario = new Usuario();
    $usuario->setConexion((new Conexion())->obtenerConexion());

    /* Checkear que no exista el correo */

    $result = $usuario->checkNoRepeatEmail($email);

    if(!$result){
        $msg = "El correo ya existe";
        $vista = new Vista();
        $vista->set('msg', $msg);
        $vista->set('nombre', $nombre);
        $vista->set('apellido', $apellido);
        $vista->set('email', $email);
        $vista->set('password', $password);
        $vista->set('telefono', $telefono);
        $vista->render('../vistas/auth/register.php', false);
    }else {
        $usuario->setNombre($nombre);
        $usuario->setApellido($apellido);
        $usuario->setEmail($email);
        $usuario->setPassword($password);
        $usuario->setTelefono($telefono);
        $usuario->setRol("user");
        $usuario->agregarUsuario();
        header('Location: ../index.php');
        exit;
    }


   
   

}







$vista = new Vista();
$vista->set('msg', $msg);
$vista->set('nombre', $nombre);
$vista->set('apellido', $apellido);
$vista->set('email', $email);
$vista->set('password', $password);
$vista->set('telefono', $telefono);
$vista->render('../vistas/auth/register.php', false);

?>