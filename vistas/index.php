<?php

$libro = new Libro();
$libro->setConexion((new Conexion())->obtenerConexion());
$libros = $libro->getLibros();

function buscarPorGenero($libros, $genero){
  $librosFiltrados = [];
  foreach($libros as $libro){
    if(strtolower($libro["genero"]) == strtolower($genero)){
      array_push($librosFiltrados, $libro);
    }
  }
  return $librosFiltrados;
}


if(isset($_POST["busqueda"])){
  $libros = buscarPorGenero($libros, $_POST["busqueda"]);
}else{
  $libros = $libro->getLibros();
}


?>

<main class="lg:container lg:mx-auto">

<!-- Barra de busqueda -->

<div class="flex justify-center items-center mt-10">
  <form action="<?= $_SERVER["PHP_SELF"]?>" method="POST" class="flex justify-center gap-2 items-center">
    <input type="text" name="busqueda" id="" placeholder="Buscar por genero" class="border-2 border-gray-400 rounded-full px-2 py-1">
    <button type="submit" class="text-white bg-blue-400 rounded-full px-2 py-1">Buscar</button>
  </form>
</div>




<div class="place-items-center grid mt-24 gap-10 lg:grid-cols-4 md:grid-cols-2 grid-cols-1">
<?php foreach($libros as $libro): ?>
   <a href="libro.php?id=<?php echo $libro["id"]?>" class="flex h-full">
   <div class="flex flex-col justify-center items-center w-60 border-2 ">
        <img src="./storage/libros/portadas/<?php echo $libro['urlImagen']; ?>" alt="" class="w-full">
      <div class="bg-gray-200 w-full h-full flex justify-center flex-col items-center p-2">
      <h1 class="text-2xl font-semibold mb-4"><?php echo $libro['titulo']; ?></h1>
        <p class="font-semibold">
            <?php echo $libro['autor']; ?>
        </p>
        <p
        class="border-2 border-gray-400 rounded-full px-2 py-1 mt-2"
        >
            <?php echo $libro['genero']; ?>
        </p>
      </div>
    </div>
   </a>
<?php endforeach; ?>
</div>
</main>