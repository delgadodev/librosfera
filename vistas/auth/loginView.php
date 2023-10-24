<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-semibold mb-6">Iniciar sesión</h1>

        <form action="<?= $_SERVER["PHP_SELF"]?>" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-600 text-sm font-medium mb-2">Correo</label>
                <input type="text" id="email" name="email" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-600 text-sm font-medium mb-2">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                Iniciar sesión
            </button>


            <div class="mb-4">
                <p>
                    o tambien puedes <a href="register.php" class="text-blue-500">registrarte</a>
                </p>
            </div>



        </form>
    </div>

</body>
</html>
