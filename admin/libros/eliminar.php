<?php
include "../../clases/Libro.php";
include "../../clases/Conexion.php";

if(isset($_GET["id"])){

    $id = $_GET["id"];
    $libro = new Libro();
    $libro->setConexion((new Conexion())->obtenerConexion());


    $urlImage = $libro->getLibroById($id)["urlImagen"];
    $urlLibro = $libro->getLibroById($id)["urlLibro"];

    echo $urlImage;
    echo $urlLibro;

    unlink("../../storage/libros/portadas/$urlImage");

    unlink("../../storage/libros/pdfs/$urlLibro");
 
    $libro->eliminarlibro($id);

    header('Location: ../../admin/librosTable.php');
}









