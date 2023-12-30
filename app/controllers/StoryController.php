<?php

include ("../../config/Database.php");           

function getUserIdAndNameForEmail($email) {
    $connection = createConnection("interactive_history");

    $sql = "SELECT usuario_id, nombre_usuario FROM usuarios WHERE email = ?";
    
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_bind_result($stmt, $usuarioId, $nombreUsuario);
    mysqli_stmt_fetch($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    return array('usuario_id' => $usuarioId, 'nombre_usuario' => $nombreUsuario);
}


function  registerUser($name, $email, $password) {
    $connection = createConnection("interactive_history");

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPassword);

    $query = mysqli_stmt_execute($stmt);

    if ($query) {
        echo "<p>Usuario creado correctamente</p>";
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

    return password_verify($password, $hashedPassword);
}

function personalizationData($usuarioId, $storyId, $protagonist, $bestFriend, $worstEnemy, $favoriteFood, $favoriteColor, $favoriteNumber) {
    $connection = createConnection("interactive_history");

    $sql = "INSERT INTO personalizacion_historia (usuario_id, id_historia, nombre_protagonista, nombre_mejor_amigo, nombre_enemigo, comida_favorita, color_favorito, numero_favorito) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

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

function updatePersonalizationData($usuarioId, $historiaId, $protagonist, $bestFriend, $worstEnemy, $favoriteFood, $favoriteColor, $favoriteNumber) {
    $connection = createConnection("interactive_history");

    $sql = "UPDATE personalizacion_historia 
            SET nombre_protagonista = ?, nombre_mejor_amigo = ?, nombre_enemigo = ?, comida_favorita = ?, color_favorito = ?, numero_favorito = ?
            WHERE usuario_id = ? AND id_historia = ?";

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
