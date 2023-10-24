<?php

include "layout/adminLayout.php";

$users = $usuario->getUsers();

?>

    <script>
        function eliminarUsuario(id) {
            if (confirm("¿Está seguro de eliminar este usuario?")) {
                window.location.href = "users/eliminar.php?id=" + id;
            }
        }
    </script>


<main class="bg-gray-100 p-8">

    <div class="max-w-screen-lg mx-auto overflow-x-auto">


        <div class="flex justify-between my-2">
                
        <h1 class="text-2xl font-semibold mb-4">Tabla de Usuarios</h1>


         <a href="users/agregar.php" class="bg-blue-500 text-white p-2 rounded shadow-md     hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue text-center">
            Crear Usuario
        </a>

        </div>




        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Apellido</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Teléfono</th>
                    <th class="py-2 px-4 border-b">Rol</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
               

                <?php foreach($users as $user): ?>
                  <tr>
                  <td class="py-2 px-4 border-b border-gray-300"><?php echo $user['nombre']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?php echo $user['apellido']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?php echo $user['email']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?php echo $user['telefono']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300"><?php echo $user['rol']; ?></td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        <a href="users/editar.php?id=<?php echo $user['id']; ?>" class="text-blue-500">Editar</a>
                        <button onclick="eliminarUsuario('<?= $user['id'] ?>')" class="text-red-500">Eliminar</button>
                    </td>
                  </tr>


                    <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</main>

