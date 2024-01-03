<?php
session_start();
session_destroy(); // Cierra la sesión
header("Location: ../../app/views/viewLogin.php"); // Redirige al usuario a la página de inicio de sesión
exit();

?>
