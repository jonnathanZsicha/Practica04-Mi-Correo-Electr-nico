<?php
 session_start();
 $_SESSION['isLogged'] = FALSE;
 session_destroy();
 header("Location: /Practica_04/public/vista/login.html");
?>