<?php

 /* Finalizar la session */

    session_start();
    session_destroy();
    header('Location: ../index.php');
    exit;

?>


