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



if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $autor = $_POST["autor"];
    $genero = $_POST["genero"];
    $fechaPublicacion = $_POST["fecha"];

/* PARA SUBIR PDF */

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

    /* FIN SUBIR PDF */



    /* PARA SUBIR IMAGEN */

    $targetDir = "../../storage/libros/portadas/";
    $uploadOk = 1;

    //  si se selecciono un archivo
    if (!isset($_FILES["imagen"])) {
        echo "Por favor, selecciona una imagen.";
        $uploadOk = 0;
    } else {
        
        $uniqueName = uniqid() . '_' . basename($_FILES["imagen"]["name"]);
        $targetFile = $targetDir . $uniqueName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

   
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check === false) {
            echo "El archivo no es una imagen válida.";
            $uploadOk = 0;
        }


        // Permitir ciertos formatos de archivo
        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
            $uploadOk = 0;
        }
    }

    
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    } else {
     
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFile)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subido con éxito.";
            echo '<br>';
            echo 'Imagen única guardada como: ' . $uniqueName;

            
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }

    /* FIN SUBIR IMAGEN */

    $libro = new Libro();
    $libro->setConexion((new Conexion())->obtenerConexion());
    $libro->setTitulo($titulo);
    $libro->setSipnosis($descripcion);
    $libro->setAutor($autor);
    $libro->setGenero($genero);
    $libro->setAñoPublicacion($fechaPublicacion);
    $libro->setUrlImagen($uniqueName);
    $libro->setUrlLibro($nombre_archivo);
    $libro->agregarLibro();

    header("Location: ../librosTable.php");

}

$vista = new Vista();
$vista->set("titulo", $titulo);
$vista->set("descripcion", $descripcion);
$vista->set("autor", $autor);
$vista->set("genero", $genero);
$vista->set("fechaPublicacion", $fechaPublicacion);
$vista->set("imagen", $imagen);
$vista->set("pdf", $pdf);
$vista->render('../../vistas/libros/agregar.php', false);