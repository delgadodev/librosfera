<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-zinc-800">
    

<div class="grid place-content-center h-screen">
    <form
        action="<?= $_SERVER['PHP_SELF'];?>"
        method="POST"
    class="flex flex-col gap-4 bg-zinc-900 w-[420px] h-[420px] p-10 items-center justify-center rounded-xl">
        <h1 class="text-2xl font-bold text-white">
            Crear Cuenta
        </h1>
        <input name="nombre" value="<?= $nombre ?>"  class="p-1 rounded-md w-full" type="text" placeholder="Nombre" required>
        <input name="apellido" value="<?= $apellido ?>"   class="p-1 rounded-md w-full" type="text" placeholder="Apellido"  required>
        <input name="email" value="<?= $email ?>"   class="p-1 rounded-md w-full" type="text" placeholder="Email" required>
        <input name="password" value="<?= $password ?>"   class="p-1 rounded-md w-full" type="password" placeholder="Contraseña" required>
        <input name="telefono" value="<?= $telefono ?>"   class="p-1 rounded-md w-full" type="tel" placeholder="telefono">
        <button class="bg-orange-400 p-2 rounded-md text-white font-semibold mt-5 w-full">
            Registrarse
        </button>


        <div class="">
            <p class="text-red-400">
                <?= $msg ?>
            </p>
        </div>
    </form>
</div>
</body>
</html>