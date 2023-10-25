<?php
include "../../clases/Usuario.php";
include "../../clases/Conexion.php";


$id = $_GET["id"];

if (!is_numeric($id)) {
   echo "No se pudo eliminar el usuario";
}else{
    $usuario = new Usuario();
    $usuario->setConexion((new Conexion())->obtenerConexion());
    $usuario->eliminarUsuario($id);

    header('Location: ../../admin/usersTable.php');
}








