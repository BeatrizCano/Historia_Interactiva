<?php
session_start();
session_destroy(); 
header("Location: ../../app/views/viewLogin.php"); 
exit();
?>
