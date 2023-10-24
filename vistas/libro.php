<main class="container mx-auto gap-5 grid grid-cols-2 mt-14 p-5">

<img class="w-full" src="./storage/libros/portadas/<?= $imagen; ?>" alt="" >


<div class="flex flex-col gap-5">
<div class="flex flex-col gap-5">
<h1 class="text-2xl font-semibold mb-4"><?= $titulo; ?></h1>


<p class="font-semibold">
    Descripcion:
  <span class="font-normal"> <?= $descripcion; ?></span>
</p>



<p class="font-semibold">
    Autor:
  <span class="font-normal"> <?= $autor; ?></span> 
</p>

<p class="font-semibold">
    Genero:
  <span class="font-normal"> <?= $genero; ?></span> 
</p>

<p class="font-semibold">
    Fecha de publicacion:
  <span class="font-normal"> <?= $fecha; ?></span> 
</p>
</div>

<?php

if($email !== "") {

    echo '<a href="./libros/reservar.php?id='.$id.'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Reservar
  </a>';

  echo '<a href="./storage/libros/pdfs/'.$urlLibro.'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Ver
</a>';



  
}



?>

</div>





    



</main>