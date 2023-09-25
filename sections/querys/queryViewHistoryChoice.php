<?php

 $sql = "SELECT id_historia, titulo, contenido FROM historias WHERE id_historia = ?";
 $stmt = mysqli_prepare($connection, $sql);
 mysqli_stmt_bind_param($stmt, "i", $storyId);
 mysqli_stmt_execute($stmt);
 $result = mysqli_stmt_get_result($stmt);
 
 if ($result && mysqli_num_rows($result) > 0) {
     // Obtener los datos de la primera historia
     $row = mysqli_fetch_assoc($result);
     $storyId= $row['id_historia'];
     $storyTitle = $row['titulo'];
     $storyContent = $row['contenido'];
 
     // Obtener los datos de personalización del usuario desde la tabla personalizacion_historia
     $userId = $_SESSION['usuario_id'];
     $personalizationSql = "SELECT nombre_protagonista, nombre_mejor_amigo, nombre_enemigo, comida_favorita, color_favorito, numero_favorito
      FROM personalizacion_historia WHERE usuario_id = ?";
     $stmt = mysqli_prepare($connection, $personalizationSql);
     mysqli_stmt_bind_param($stmt, "i", $userId);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_bind_result($stmt, $protagonistName, $bestFriendName, $enemyName, $favoriteFood, $favoriteColor, $favoriteNumber);
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
         $storyContent = str_replace($marker, $value, $storyContent);
         $storyTitle = str_replace($marker, $value, $storyTitle);
     }       
     

     // Obtener las opciones de la historia actual
     $optionsSql = "SELECT id_opcion, texto FROM opciones WHERE id_historia = ? LIMIT 2";
     $stmtOptions = mysqli_prepare($connection, $optionsSql);
     mysqli_stmt_bind_param($stmtOptions, "i", $storyId);
     mysqli_stmt_execute($stmtOptions);
     $optionsResult = mysqli_stmt_get_result($stmtOptions);
     mysqli_stmt_close($stmtOptions);

     //está en las vistas (lo dejé comentado por si acaso) 
       // Mostrar el título y contenido de la primera historia
        //echo "<h1>$storyTitle</h1>";
         //echo "<p>$storyContent</p>";

 }
 else {
     echo "<p>No se encontraron historias.</p>";
 }

 mysqli_close($connection);
 
?>