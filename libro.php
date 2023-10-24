
<?php
include 'clases/Libro.php';
include 'clases/Conexion.php';
include 'clases/Vista.php';

session_start();

$email = "";

if(isset($_GET["id"])){
$libro = new Libro();
$libro->setConexion((new Conexion())->obtenerConexion());
$result = $libro->getLibroById($_GET['id']);

$id = $result['id'];
$imagen = $result['urlImagen'];
$titulo = $result['titulo'];
$autor = $result['autor'];
$genero = $result['genero'];
$descripcion = $result['descripcion'];
$fechaPublicacion = $result['fecha'];
$urlLibro = $result['urlLibro'];

}

if(isset($_SESSION["email"])){
    $email = $_SESSION["email"];
}


$vista = new Vista();
$vista->set('imagen', $imagen);
$vista->set('titulo', $titulo);
$vista->set('autor', $autor);
$vista->set('genero', $genero);
$vista->set('descripcion', $descripcion);
$vista->set('fecha', $fechaPublicacion);
$vista->set('urlLibro', $urlLibro);
$vista->set('id', $id);
$vista->set('email', $email);
$vista->render('vistas/libro.php');







?>



