<?php

function createConnection($database) {
    
   // Datos de conexión
	$host = "localhost";
	$user = "root";
	$password = "";
	$connection = mysqli_connect($host, $user, $password, $database);

	if (!$connection) {
		die("Error de conexión con la base de datos vuelva a intentarlo más tarde " . mysqli_connect_error());
	}
	
	return $connection;


}



?>