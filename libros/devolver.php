<?php

include "../clases/Prestamos.php";
include "../clases/Conexion.php";

/* Eliminar el prestamo */

if(isset($_GET["id"])){

    $id = $_GET["id"];

    $prestamo = new Prestamos();

    $prestamo->setConexion((new Conexion())->obtenerConexion());

    $prestamo->devolverPrestamo($id);

    header("Location: ../prestamos.php");

}


