<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
include "../../clases/Prestamos.php";
include "../../clases/Conexion.php";
include "../../clases/Libro.php";

if(isset($_GET["id"])){

    $id = $_GET["id"];


    $prestamo = new Prestamos();
    $prestamo->setConexion((new Conexion())->obtenerConexion());



    $result = $prestamo->getPrestamo($id);

    $libro = new Libro();
    $libro->setConexion((new Conexion())->obtenerConexion());
    $libro = $libro->getLibroById($result["libro_id"]);

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'librosfera@outlook.com';  // Tu dirección de correo Outlook/Hotmail
        $mail->Password = 'librosucse1234';  // Tu contraseña de Outlook/Hotmail
        $mail->SMTPSecure = 'tls';  // Puedes cambiarlo a 'ssl' si es necesario
        $mail->Port = 587;
    
        // Configuración del remitente y destinatario
        $mail->setFrom('librosfera@outlook.com', 'LibroSfera');
        $mail->addAddress($result["user_id"], 'Destinatario');
    
        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Notificacion de devolucion de libro';
        $mail->Body    = '<p>Hola, le queria recordar que
        <br>el libro <strong>' . $libro["titulo"] . '</strong> 
        tiene que ser devuelto el dia <strong>' . $result["fecha_fin"] . '</strong>
        .</p>';

    
    
       
        $mail->send();

        echo "
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css'>
        <div class='h-screen grid place-content-center'>
        <h1 class='text-4xl text-white bg-blue-500 p-40 rounded-full'>Correo enviado correctamente</h1>
        </div>";

        /* Redirigir en 5 seg */

        header("refresh:3;url=../prestamosTable.php");






        
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
    




}





?>
