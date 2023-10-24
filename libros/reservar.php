<?php

include "../clases/Libro.php";
include "../clases/Prestamos.php";
include "../clases/Conexion.php";
include "../clases/Usuario.php";

$titulo = "";
$fechaInicio = "";
$fechaFin = "";



if(isset($_GET["id"])){
    session_start();
    $email = $_SESSION["email"];
    $id = $_GET["id"];
    $libro = new Libro();
    $libro->setConexion((new Conexion())->obtenerConexion());
    $result = $libro->getLibroById($_GET['id']);
    $titulo = $result["titulo"];
    $idUsuario = $email;

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
      
    $idUsuario = $_POST["idUsuario"];
    $fechaInicio = $_POST["startDate"];
    $fechaFin = $_POST["endDate"];
    $idLibro = $_POST["id"];
    $prestamo = new Prestamos();
    $prestamo->setConexion((new Conexion())->obtenerConexion());
    $prestamo->createPrestamo($idUsuario, $idLibro, $fechaInicio, $fechaFin) ;
    header('Location: ../prestamos.php');


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Reservar libro</title>
</head>
<body>
<div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
<h1 class="text-2xl font-semibold mb-6">Reservar libro</h1>
<form method="POST" action="<?= $_SERVER["PHP_SELF"]?>">
<div class="mb-4">
                <input type="hidden" id="id" name="id" value="<?= $id ?>">

                <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $idUsuario ?>">

                <label for="titulo" class="block text-gray-600 text-sm font-medium mb-2">Titulo</label>
                <p>
                    <?= $titulo ?>
                </p>
                
            </div>


            <div class="mb-4">
                <label for="startDate" class="block text-gray-600 text-sm font-medium mb-2">Desde:</label>
                <input type="date" id="startDate" name="startDate"  value="<?= $fechaInicio ?>" class="w-full p-2 border rounded"
                min=""
                max=""
                required
                >
            </div>

            <div class="mb-4">
                <label for="endDate" class="block text-gray-600 text-sm font-medium mb-2">Hasta:</label>
                <input type="date" id="endDate" name="endDate"  value="<?= $fechaFin ?>" class="w-full p-2 border rounded"
                min=""
                max=""
                required
                >
            </div>
           


            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                Guardar
            </button>

</div>
</form>
</div>  

<script>




document.addEventListener("DOMContentLoaded", function () {




      const startDateInput = document.getElementById("startDate");

      // Establecer la fecha mínima en la fecha actual
      const today = new Date().toISOString().split("T")[0];

      startDateInput.setAttribute("min", today);

      // Manejar el evento de cambio en la fecha de inicio


      startDateInput.addEventListener("change", function () {
        // Obtener la fecha seleccionada en la fecha de inicio

        const selectedStartDate = new Date(startDateInput.value);
        
        // Calcular la fecha máxima permitida en la fecha de fin (30 días después de la fecha de inicio)
        const maxEndDate = new Date(selectedStartDate);
        maxEndDate.setDate(selectedStartDate.getDate() + 30);

        required
        // Formatear la fecha máxima como cadena YYYY-MM-DD
        const maxEndDateString = maxEndDate.toISOString().split("T")[0];

        // Establecer la fecha máxima en la fecha de fin
        const endDateInput = document.getElementById("endDate");

        endDateInput.setAttribute("max", maxEndDateString);

        //la fecha minima de la fecha de fin tiene que ser como maximo 1 dia mas de la fecha de inicio
        const minEndDate = new Date(selectedStartDate);
        minEndDate.setDate(selectedStartDate.getDate() + 1);

        // Formatear la fecha máxima como cadena YYYY-MM-DD
        const minEndDateString = minEndDate.toISOString().split("T")[0];

        // Establecer la fecha máxima en la fecha de fin
        endDateInput.setAttribute("min", minEndDateString);

      });
    });

</script>
    
</body>
</html>














