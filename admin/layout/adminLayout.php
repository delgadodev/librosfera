<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="font-sans">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo o Título -->
            <div class="text-white">
                <a href="#" class="text-lg font-semibold">Biblioteca</a>
            </div>

            <!-- Menú principal para pantallas grandes -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="../index.php" class="text-white">Inicio</a>
                <?php
                include "../clases/Conexion.php";
                include "../clases/Usuario.php";

                
               
                session_start();

                if (isset($_SESSION["email"])) {

                    echo '<a href="../prestamos.php" class="text-white">Mis prestamos</a>';

                    $usuario = new Usuario();
                    $usuario->setConexion((new Conexion())->obtenerConexion());

                    if ($usuario->checkAdmin($_SESSION["email"])) {
                        echo '<a href="index.php" class="text-white">Admin</a>';
                    }
                }

                if (isset($_SESSION["email"])) {
                    echo '<a href="./users/logout.php" class="text-white">Logout</a>';
                } else {
                    echo '<a href="./users/login.php" class="text-white">Login</a>';
                }

                ?>
            </div>
            <!-- Ícono del menú para pantallas pequeñas -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Menú desplegable para pantallas pequeñas -->
    <div id="menu" class="md:hidden bg-gray-800 hidden p-4">
        <a href="#" class="block text-white py-2">Inicio</a>

        <?php

if (isset($_SESSION["email"])) {

    echo '<a href="./users/profile.php" class="text-white">Mis prestamos</a>';

    $usuario = new Usuario();
    $usuario->setConexion((new Conexion())->obtenerConexion());

    if ($usuario->checkAdmin($_SESSION["email"])) {
        echo '<a href="index.php" class="text-white block py-2">Admin</a>';
    }
}

if (isset($_SESSION["email"])) {
    echo '<a href="./users/logout.php" class="text-white block py-2">Logout</a>';
} else {
    echo '<a href="./users/login.php" class="text-white block py-2">Login</a>';
}
        ?>
       
    </div>











    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>

</body>
</html>


