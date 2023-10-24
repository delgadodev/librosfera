
<?php

include "layout/adminLayout.php";

?>



<main class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Acceso a Usuarios -->
        <a href="usersTable.php" class="bg-blue-500 text-white p-8 rounded shadow-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue block text-center">
            Usuarios
        </a>

        <!-- Acceso a Libros -->
        <a href="librosTable.php" class="bg-green-500 text-white p-8 rounded shadow-md hover:bg-green-600 focus:outline-none focus:shadow-outline-green block text-center">
            Libros
        </a>

        <!-- Acceso a Préstamos -->
        <a href="prestamosTable.php" class="bg-yellow-500 text-white p-8 rounded shadow-md hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow block text-center">
            Préstamos
        </a>
    </div>

</main>




