<?php
include '../../clases/Usuario.php';
include '../../clases/Conexion.php';
include '../../clases/Vista.php';


$apellido = "";
$nombre = "";
$telefono = "";
$email = "";
$rol = "";
$password = "";




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $rol = $_POST["rol"];
    $password = $_POST["password"];
    
    $conn = new Conexion();
    $usuario = new Usuario();
    $usuario->setConexion($conn->obtenerConexion());

    $usuario->setApellido($apellido);
    $usuario->setNombre($nombre);
    $usuario->setTelefono($telefono);
    $usuario->setEmail($email);
    $usuario->setPassword($password);
    $usuario->setRol($rol);

    $usuario->agregarUsuario();

    header('Location: ../../admin/usersTable.php');
    exit;
}

$vista = new Vista();
$vista->set('apellido', $apellido);
$vista->set('nombre', $nombre);
$vista->set('telefono', $telefono);
$vista->set('rol', $rol);
$vista->set('email', $email);
$vista->set('password', $password);
$vista->render('../../vistas/users/agregar.php', false);
?>
