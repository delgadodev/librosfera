<?php
include "../../clases/Usuario.php";
include "../../clases/Conexion.php";


/* Obtener el id por url */
$id = $_GET["id"];

/* Si el id no es un número, redireccionar */

if (!is_numeric($id)) {
   echo "No se pudo eliminar el usuario";
}else{
    $usuario = new Usuario();
    $usuario->setConexion((new Conexion())->obtenerConexion());
    $usuario->eliminarUsuario($id);

    header('Location: ../../admin/usersTable.php');
}








