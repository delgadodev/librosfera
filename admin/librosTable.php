<?php

include "layout/adminLayout.php";

include "../clases/Libro.php";

$libro = new Libro();

$libro->setConexion((new Conexion())->obtenerConexion());

$libros = $libro->getLibros();

?>

    <script>
        function eliminarLibro(id) {
            if (confirm("¿Está seguro de eliminar este libro?")) {
                window.location.href = "libros/eliminar.php?id=" + id;
            }
        }
    </script>


<main class="bg-gray-100 p-8">

    <div class="max-w-screen-lg mx-auto overflow-x-auto">


        <div class="flex justify-between my-2">
                
        <h1 class="text-2xl font-semibold mb-4">Tabla de Libros</h1>


         <a href="libros/agregar.php" class="bg-blue-500 text-white p-2 rounded shadow-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue text-center">
            Crear libro
        </a>
        </div>


        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Titulo</th>
                    <th class="py-2 px-4 border-b">Sipnosis</th>
                    <th class="py-2 px-4 border-b">Autor</th>
                    <th class="py-2 px-4 border-b">Genero</th>
                    <th class="py-2 px-4 border-b">Año de publicacion</th>
                    <th class="py-2 px-4 border-b">Imagen</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
               

                <?php foreach($libros as $libro): ?>
                  <tr>
                  <td class="py-2 px-4 border-b border-gray-300"><?php echo $libro['titulo']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?php echo $libro['descripcion']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?php echo $libro['autor']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?php echo $libro['genero']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?php echo $libro['fecha']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        <img src="../storage/libros/portadas/<?php echo $libro['urlImagen']; ?>" alt="" class="w-14">
                    </td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        <a href="../storage/libros/pdfs/<?php echo $libro['urlLibro']; ?>" class="text-blue-500">Ver</a>
                    </td>

                    <td class="py-2 px-4 border-b border-gray-300">
                        <a href="libros/editar.php?id=<?php echo $libro['id']; ?>" class="text-blue-500">Editar</a>
                        <button onclick="eliminarLibro('<?= $libro['id'] ?>')" class="text-red-500">Eliminar</button>
                    </td>
                  </tr>


                    <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</main>

