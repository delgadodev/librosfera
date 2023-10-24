


<?php

include "layout/adminLayout.php";
include "../clases/Prestamos.php";
include "../clases/Libro.php";

$prestamos = null;

$prestamo = new Prestamos();
$prestamo->setConexion((new Conexion())->obtenerConexion());
$prestamos = $prestamo->getPrestamos();

$libro = new Libro();
$libro->setConexion((new Conexion())->obtenerConexion());



?>




<main class="bg-gray-100 p-8">

    <div class="max-w-screen-lg mx-auto overflow-x-auto">


        <div class="flex justify-between my-2">
                
        <h1 class="text-2xl font-semibold mb-4">Prestamos de usuarios</h1>

        </div>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Libro</th>
                    <th class="py-2 px-4 border-b">Usuario</th>
                    <th class="py-2 px-4 border-b">Fecha de inicio prestamo</th>
                    <th class="py-2 px-4 border-b">Fecha de fin de prestamo</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php

                if($prestamos != null){
                    foreach($prestamos as $prestamo){
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b'>" . $libro->getLibroById($prestamo["libro_id"])["titulo"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $prestamo["user_id"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $prestamo["fecha_inicio"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $prestamo["fecha_fin"] . "</td>";

                        echo "<td class='px-4 py-2 flex gap-5 items-center border-b'>";
                        echo "<a href='./prestamos/notificar.php?id=" . $prestamo["id"] . "' class='text-blue-500'>Notificar devolucion</a>";
                    
                    
                        echo "<a href='./prestamos/eliminar.php?id=" . $prestamo["id"] . "'class='text-red-500'>Eliminar</a>";
                       
                        echo "</tr>";
                    }
                }else {
                    echo "<tr>";
                    echo "<td class='py-2 px-4 border-b' colspan='4'>No hay prestamos</td>";
                    echo "</tr>";
                }

?>
               

               
            </tbody>
        </table>

    </div>

</main>