<?php

include "../../clases/Vista.php";
include "../../clases/Libro.php";
include "../../clases/Conexion.php";

$titulo = "";
$descripcion="";
$autor="";
$genero="";
$fechaPublicacion="";
$imagen="";
$pdf="";

$vista = new Vista();

if(isset($_GET["id"])){

    $id = $_GET["id"];
    $vista->set("id", $_GET["id"]);
    $libro = new Libro();
    $libro->setConexion((new Conexion())->obtenerConexion());
    $libro->setId($id);
    $result = $libro->getLibroById($id);
    $titulo = $result["titulo"];
    $descripcion =  $result["descripcion"];
    $autor =  $result["autor"];
    $genero =  $result["genero"];
    $fechaPublicacion =  $result["fecha"];
    $imagen =   $result["urlImagen"];
    $pdf =  $result["urlLibro"];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
    $idLibro = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];
    $fechaPublicacion = $_POST["fecha"];


/* PARA SUBIR PDF */

    if(!empty($_FILES["archivo_pdf"]["name"])){

        if(!empty($_POST["archivo_pdf_anterior"])){
            unlink("../../storage/libros/pdfs/" . $_POST["archivo_pdf_anterior"]);
        }


 $carpeta_destino = '../../storage/libros/pdfs/';
$nombre_archivo = uniqid('pdf_') . '.pdf';
$ruta_archivo = $carpeta_destino . $nombre_archivo;

if ($_FILES['archivo_pdf']['error'] !== UPLOAD_ERR_OK) {
    die('Error al subir el archivo.');
}

$tipo_archivo = mime_content_type($_FILES['archivo_pdf']['tmp_name']);
$extension_permitida = 'application/pdf';

if ($tipo_archivo !== $extension_permitida) {
    die('Tipo de archivo no permitido.');
}

if (!is_uploaded_file($_FILES['archivo_pdf']['tmp_name']) || !move_uploaded_file($_FILES['archivo_pdf']['tmp_name'], $ruta_archivo)) {
    die('Error al subir el archivo.');
}
    $pdf = $nombre_archivo;

    }else{
        $pdf = $_POST["archivo_pdf_anterior"];
    }

    /* FIN SUBIR PDF */



    /* PARA SUBIR IMAGEN */
    if(!empty($_FILES["imagen"]["name"])){

    if(!empty($_POST["imagen_anterior"])){
        unlink("../../storage/libros/portadas/" . $_POST["imagen_anterior"]);
    }
    


    $targetDir = "../../storage/libros/portadas/";
    $uploadOk = 1;
    // comprobar que se selecciono una imagen
    if (!isset($_FILES["imagen"])) {
        echo "Por favor, selecciona una imagen.";
        $uploadOk = 0;
    } else {

        // nombre unico para la imagen
        $uniqueName = uniqid() . '_' . basename($_FILES["imagen"]["name"]);
        $targetFile = $targetDir . $uniqueName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // verificar si es una imagen 
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check === false) {
            echo "El archivo no es una imagen";
            $uploadOk = 0;
        }

        // formatos permitidos
        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        }
    }

    // verificar si $uploadOk no tiene errror
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    } else {
        // Intentar subir el archivo
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {

            $imagen = $uniqueName;

        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
    /* FIN SUBIR IMAGEN */
    }else {
        $imagen = $_POST["imagen_anterior"];
    }

    $libro = new Libro();
    $libro->setConexion((new Conexion())->obtenerConexion());
    $libro->setTitulo($titulo);
    $libro->setSipnosis($descripcion);
    $libro->setAutor($autor);
    $libro->setGenero($genero);
    $libro->setAñoPublicacion($fechaPublicacion);
    $libro->setUrlImagen($imagen);
    $libro->setUrlLibro($pdf);
    $libro->editarLibro($idLibro);

    header("Location: ../librosTable.php");

}


$vista->set("titulo", $titulo);
$vista->set("descripcion", $descripcion);
$vista->set("autor", $autor);
$vista->set("genero", $genero);
$vista->set("fecha", $fechaPublicacion);
$vista->set("imagen", $imagen);
$vista->set("pdf", $pdf);
$vista->render('../../vistas/libros/editar.php', false);