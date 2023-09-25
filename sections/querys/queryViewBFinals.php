<?php

$sql = "SELECT id_final, texto FROM finales WHERE id_historia = ? AND orden = 2";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "i", $storyId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // Obtener los datos del final A de la historia
    $row = mysqli_fetch_assoc($result);
    $finalAText = $row['texto'];

    // Obtener los datos de personalización del usuario desde la tabla personalizacion_historia
    $userId = $_SESSION['usuario_id'];
    $personalizationSql = "SELECT nombre_protagonista, nombre_mejor_amigo, nombre_enemigo, comida_favorita, color_favorito, numero_favorito
         FROM personalizacion_historia WHERE usuario_id = ?";
    $stmt = mysqli_prepare($connection, $personalizationSql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$protagonistName, $bestFriendName, $enemyName, $favoriteFood, $favoriteColor, $favoriteNumber);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    //  Crea un arreglo $replacementscon los marcadores y sus valores correspondientes,
        // y luego itera a través de ese arreglo para reemplazar los marcadores en el contenido y el título.
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
    //Está en la vista finales (lo dejo comentado por si acaso)   
    // Mostrar el texto del final A
    //echo "<h1>¡Final A de la historia!</h1>";
    //echo "<p>$finalAText</p>";
}
else {
    echo "<p>No se encontraron finales para la historia.</p>";
}

    mysqli_close($connection);

?>