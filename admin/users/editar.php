


<?php

include '../../clases/Usuario.php';
include '../../clases/Conexion.php';

$usuario = new Usuario();
$usuario->setConexion((new Conexion())->obtenerConexion());

$nombre = "";
$apellido = "";
$telefono = "";
$email = "";
$password = "";
$rol = "";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $datosUsuario = $usuario->getUserById($id);

    $nombre = $datosUsuario['nombre'];
    $apellido = $datosUsuario['apellido'];
    $telefono = $datosUsuario['telefono'];
    $email = $datosUsuario['email'];
    $password = $datosUsuario['password'];
    $rol = $datosUsuario['rol'];
}


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $usuario->setNombre($nombre);
    $usuario->setApellido($apellido);
    $usuario->setTelefono($telefono);
    $usuario->setEmail($email);
    $usuario->setPassword($password);
    $usuario->setRol($rol);

    $usuario->editarUsuario($id);

    header("Location: ../usersTable.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar usuario</title>
</head>
<body>
<div class="max-w-md mx-auto bg-white p-6  mt-16  rounded-md shadow-md">
<h1 class="text-2xl font-semibold mb-6">Editar usuario</h1>
<form method="POST" action="">
<div class="mb-4">
                <label for="nombre" class="block text-gray-600 text-sm font-medium mb-2">Nombre</label>
                <input type="text" id="nombre" name="nombre"  value="<?= $nombre ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="apellido" class="block text-gray-600 text-sm font-medium mb-2">Apellido</label>
                <input type="text" id="apellido" name="apellido"  value="<?= $apellido ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Email</label>
                <input type="email" id="email" name="email"  value="<?= $email ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="telefono" class="block text-gray-600 text-sm font-medium mb-2">Teléfono</label>
                <input type="tel" id="telefono" name="telefono"  value="<?= $telefono ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Contraseña</label>
                <input type="password" id="password" name="password"  value="<?= $password ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">

                <label for="rol" class="block text-gray-600 text-sm font-medium mb-2">Rol</label>
                <select name="rol" id="rol" value="<?= $rol ?>" class="w-full p-2 border rounded">
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>


            </div>


            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                Registrar
            </button>

</div>
</form>
</div>
    
</body>
</html>




