<?php

$sql = "SELECT id_final, texto FROM finales WHERE id_historia = ? AND orden = 1";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "i", $storyId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
   
    $row = mysqli_fetch_assoc($result);
    $finalAText = $row['texto'];
  
    $userId = $_SESSION['usuario_id'];
    $personalizationSql = "SELECT nombre_protagonista, nombre_mejor_amigo, nombre_enemigo, comida_favorita, color_favorito, numero_favorito
         FROM personalizacion_historia WHERE usuario_id = ?";
    $stmt = mysqli_prepare($connection, $personalizationSql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$protagonistName, $bestFriendName, $enemyName, $favoriteFood, $favoriteColor, $favoriteNumber);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    
        $replacements = array(
            '[nombre_protagonista]' => $protagonistName,
            '[nombre_mejor_amigo]' => $bestFriendName,
            '[nombre_enemigo]' => $enemyName,
            '[comida_favorita]' => $favoriteFood,
            '[color_favorito]' => $favoriteColor,
            '[numero_favorito]' => $favoriteNumber
        );
        
        foreach ($replacements as $marker => $value) {
            $finalAText = str_replace($marker, $value,  $finalAText);
        }       
    
    }
    else {
        echo "<p>No se encontraron finales para la historia.</p>";
    }

    mysqli_close($connection);

?>