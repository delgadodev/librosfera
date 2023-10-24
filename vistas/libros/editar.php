<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Crear libro</title>
</head>
<body>
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
<h1 class="text-2xl font-semibold mb-6">Editar Libro</h1>
<form method="POST" action="<?= $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data">
<div class="mb-4">
    
                <input type="hidden" name="id" value="<?= $id ?>">

                <label for="titulo" class="block text-gray-600 text-sm font-medium mb-2">Titulo</label>
                <input type="text" id="titulo" name="titulo"  value="<?= $titulo ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-600 text-sm font-medium mb-2">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion"  value="<?= $descripcion ?>" class="w-full p-2 border rounded">
                </input>
            </div>

            <div class="mb-4">
                <label for="autor" class="block text-gray-600 text-sm font-medium mb-2">Autor</label>
                <input type="autor" id="autor" name="autor"  value="<?= $autor ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="genero" class="block text-gray-600 text-sm font-medium mb-2">Genero</label>
                <input type="tel" id="genero" name="genero"  value="<?= $genero ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="fecha" class="block text-gray-600 text-sm font-medium mb-2">Fecha de publicacion</label>
                <input type="date" id="fecha" name="fecha"  value="<?= $fecha ?>" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="imagen" class="block text-gray-600 text-sm font-medium mb-2">Portada</label>

                <input type="file" id="imagen" name="imagen" acept="image/*"  value="<?= $imagen ?>" class="w-full p-2 border rounded">

                <input type="hidden" name="imagen_anterior"
            value="<?= $imagen ?>"
            >

            </div>

            <div class="mb-4">
            <!-- Archivo pdf --> 

            <label for="archivo_pdf" class="block text-gray-600 text-sm font-medium mb-2">PDF</label>
         
            <input type="file" id="archivo_pdf" name="archivo_pdf" accept=".pdf"  class="w-full p-2 border rounded">
            </div>

            <input type="hidden" name="archivo_pdf_anterior"
            value="<?= $pdf ?>"
            >


            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                Guardar
            </button>

</div>
</form>
</div>
    
</body>
</html>