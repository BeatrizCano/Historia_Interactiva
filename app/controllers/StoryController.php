<?php
//session_start(); // Iniciar la sesión
include ("../../config/Database.php");           

function getUserIdAndNameForEmail($email) {
    $connection = createConnection("interactive_history");

    // Consulta SQL para obtener el usuario_id y el nombre de usuario basado en el nombre de usuario
    $sql = "SELECT usuario_id, nombre_usuario FROM usuarios WHERE email = ?";
    
    // Usar sentencias preparadas para proteger contra inyección SQL
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    
    // Obtener el resultado de la consulta
    mysqli_stmt_bind_result($stmt, $usuarioId, $nombreUsuario);
    mysqli_stmt_fetch($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    return array('usuario_id' => $usuarioId, 'nombre_usuario' => $nombreUsuario);
}


// INSERT INTO usuarios (nombre_usuario,email,contrasena) VALUES ("NOMBRE","EMAIL","PASS");
function  registerUser($name, $email, $password) {
    $connection = createConnection("interactive_history");

    // Encriptar la contraseña utilizando la función password_hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES (?, ?, ?)";

    // Usar sentencias preparadas para proteger contra inyección SQL
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {
        echo "<p>Usuario creado correctamente</p>";
        // después de insertar exitosamente los datos del usuario en la base de datos, 
        //el código redireccionará al usuario a la vista de inicio de sesión Redireccionar al usuario a la vista de inicio de sesión
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header("Location: viewLogin.php");

    } else {
        echo "<p>Error al crear el usuario: " . mysqli_error($connection) . "</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}


function login($email, $password) {
    $connection = createConnection("interactive_history");
    
    $sql = "SELECT contrasena FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $hashedPassword);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    
    // Verificar la contraseña utilizando password_verify
    return password_verify($password, $hashedPassword);
}

// INSERT INTO usuarios (nombre_usuario,email,contrasena) VALUES ("NOMBRE","EMAIL","PASS");
function personalizationData($usuarioId, $storyId, $protagonist, $bestFriend, $worstEnemy, $favoriteFood, $favoriteColor, $favoriteNumber) {
    $connection = createConnection("interactive_history");

    $sql = "INSERT INTO personalizacion_historia (usuario_id, id_historia, nombre_protagonista, nombre_mejor_amigo, nombre_enemigo, comida_favorita, color_favorito, numero_favorito) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Usar sentencias preparadas para proteger contra inyección SQL
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "iisssssi", $usuarioId, $storyId, $protagonist, $bestFriend, $worstEnemy, $favoriteFood, $favoriteColor, $favoriteNumber);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {
        echo "<p>Personalización guardada correctamente</p>";
    } else {
        echo "<p>Error al guardar la personalización: " . mysqli_error($connection) . "</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}

// ... (otras funciones y códigos anteriores)

// Verificar si un correo electrónico ya está registrado
function isEmailRegistered($email) {
    $connection = createConnection("interactive_history");

    $sql = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    return $count > 0;
}

//función para obtener los datos de personalización actuales del usuario (modificación de la personalización)
function getPersonalizationData($usuarioId) {
    $connection = createConnection("interactive_history");

    $sql = "SELECT * FROM personalizacion_historia WHERE usuario_id = ?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "i", $usuarioId);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    $personalizacion = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    return $personalizacion;
}

//función para actualizar los datos de personalización actuales del usuario (modificación de la personalización)
function updatePersonalizationData($usuarioId, $historiaId, $protagonist, $bestFriend, $worstEnemy, $favoriteFood, $favoriteColor, $favoriteNumber) {
    $connection = createConnection("interactive_history");

    $sql = "UPDATE personalizacion_historia 
            SET nombre_protagonista = ?, nombre_mejor_amigo = ?, nombre_enemigo = ?, comida_favorita = ?, color_favorito = ?, numero_favorito = ?
            WHERE usuario_id = ? AND id_historia = ?";

    // Usar sentencias preparadas para proteger contra inyección SQL
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssii", $protagonist, $bestFriend, $worstEnemy, $favoriteFood, $favoriteColor, $favoriteNumber, $usuarioId, $historiaId);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {
        echo "<p>Personalización actualizada correctamente</p>";
    } else {
        echo "<p>Error al actualizar la personalización: " . mysqli_error($connection) . "</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}


?>