<?php
include "../../clases/Libro.php";
include "../../clases/Conexion.php";


/* Obtener el id por url */
if(isset($_GET["id"])){

    $id = $_GET["id"];
    $libro = new Libro();
    $libro->setConexion((new Conexion())->obtenerConexion());


    $urlImage = $libro->getLibroById($id)["urlImagen"];
    $urlLibro = $libro->getLibroById($id)["urlLibro"];

    echo $urlImage;
    echo $urlLibro;
 
    /* Eliminar la imagen del libro */
    unlink("../../storage/libros/portadas/$urlImage");
    /* Eliminar el pdf del libro */
    unlink("../../storage/libros/pdfs/$urlLibro");
    /* Eliminar el libro de la bd */
    
    $libro->eliminarlibro($id);

    header('Location: ../../admin/librosTable.php');
}









