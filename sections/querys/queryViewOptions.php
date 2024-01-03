<?php
// Obtener las opciones de la historia actual
$optionsSql = "SELECT id_opcion, texto FROM opciones WHERE id_historia = ? LIMIT 2";
$stmtOptions = mysqli_prepare($connection, $optionsSql);
mysqli_stmt_bind_param($stmtOptions, "i", $storyId);
mysqli_stmt_execute($stmtOptions);
$optionsResult = mysqli_stmt_get_result($stmtOptions);

// Guardar opciones en un array
$options = [];
while ($optionRow = mysqli_fetch_assoc($optionsResult)) {
    $options[] = $optionRow;
}

// Cerrar el statement de la consulta de opciones
mysqli_stmt_close($stmtOptions);

// Obtener datos de personalización específicos para esta historia y usuario
$personalizationSql = "SELECT nombre_protagonista, nombre_mejor_amigo, nombre_enemigo, comida_favorita, color_favorito, numero_favorito
    FROM personalizacion_historia WHERE usuario_id = ? AND id_historia = ?";
$stmtPersonalization = mysqli_prepare($connection, $personalizationSql);
mysqli_stmt_bind_param($stmtPersonalization, "ii", $userId, $storyId);
mysqli_stmt_execute($stmtPersonalization);
mysqli_stmt_bind_result($stmtPersonalization, $protagonistName, $bestFriendName, $enemyName, $favoriteFood, $favoriteColor, $favoriteNumber);
mysqli_stmt_fetch($stmtPersonalization);
mysqli_stmt_close($stmtPersonalization);

// Personalizar y guardar los textos de las opciones
$optionTexts = [];
foreach ($options as $optionRow) {
    $optionId = $optionRow['id_opcion'];
    $optionText = $optionRow['texto'];

    // Reemplazar marcadores en el texto de la opción con datos de personalización
    $optionReplacements = array(
        '[nombre_protagonista]' => $protagonistName,
        '[nombre_mejor_amigo]' => $bestFriendName,
        '[nombre_enemigo]' => $enemyName,
        '[comida_favorita]' => $favoriteFood,
        '[color_favorito]' => $favoriteColor,
        '[numero_favorito]' => $favoriteNumber
    );

    foreach ($optionReplacements as $marker => $value) {
        $optionText = str_replace($marker, $value, $optionText);
    }

    // Guardar el texto de la opción personalizada
    $optionTexts[] = $optionText;
}

// Cerrar la conexión
mysqli_close($connection);
?>
