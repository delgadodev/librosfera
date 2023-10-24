
<?php

include "./clases/Libro.php";
include "./clases/Prestamos.php";

$prestamo = new Prestamos();
$prestamo->setConexion((new Conexion())->obtenerConexion());
$prestamos = $prestamo->getPrestamoByUser($_SESSION["email"]);


?>



    <script>
        function eliminarUsuario(id) {
            if (confirm("¿Está seguro de eliminar este usuario?")) {
                window.location.href = "prestamos/eliminar.php?id=" + id;
            }
        }
    </script>


<main class="bg-gray-100 p-8">

    <div class="max-w-screen-lg mx-auto overflow-x-auto">


        <div class="flex justify-between my-2">
                
        <h1 class="text-2xl font-semibold mb-4">Mis prestamos</h1>

        </div>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Libro</th>
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
                        echo "<td class='py-2 px-4 border-b'>" . $prestamo["libro_id"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $prestamo["fecha_inicio"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $prestamo["fecha_fin"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>";
                        echo "<a href='libros/devolver.php?id=" . $prestamo["id"] . "' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Devolver</a>";
                        echo "</td>";
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

