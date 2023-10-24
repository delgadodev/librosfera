

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

            <?php
                session_start();
                $usuario = new Usuario();
                $usuario->setConexion((new Conexion())->obtenerConexion());


            if($usuario->checkAdmin($_SESSION["email"])){
                echo '
                <div class="mb-4">

                    <label for="rol" class="block text-gray-600 text-sm font-medium mb-2">Rol</label>
                    <select name="rol" id="rol" value="<?= $rol ?>" class="w-full p-2 border rounded">
                        <option value="">Seleccione un rol</option>
                        <option value="admin">Administrador</option>
                        <option value="user">Usuario</option>
                    </select>



                </div>
                ';




            }




            ?>



            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                Registrar
            </button>

</div>
