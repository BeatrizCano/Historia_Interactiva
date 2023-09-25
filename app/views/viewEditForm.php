<?php
    include ("../controllers/StoryController.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Procesar y guardar los datos modificados
        $usuarioId = $_SESSION['usuario_id'];
        $protagonist = $_POST["protagonist"];
        $bestFriend = $_POST["best_friend"];
        $worstEnemy = $_POST["worst_enemy"];
        $favoriteFood = $_POST["favorite_food"];
        $favoriteColor = $_POST["favorite_color"];
        $favoriteNumber = $_POST["favorite_number"];
        $historiaId = $_POST["historia_id"];
        
        // Actualizar los datos de personalización en la base de datos
        updatePersonalizationData($usuarioId, $historiaId, $protagonist, $bestFriend, $worstEnemy, $favoriteFood, $favoriteColor, $favoriteNumber);

        // Redirigir de nuevo a la vista de formulario con los datos actualizados
        header("Location: viewAfterPersonalizationForm.php");
        exit();
    }

    // Obtener los datos actuales de personalización
    $usuarioId = $_SESSION['usuario_id'];
    $datosPersonalizacion = getPersonalizationData($usuarioId);
?>

<?php
    include ("../../templates/head.php");
?>

    <h1>Edición de Personalización</h1>

    <form action="viewEditForm.php" method="POST">
        <input type="hidden" name="historia_id" value="<?php echo $datosPersonalizacion['id_historia']; ?>">
        
        <label for="protagonist">Nombre del Protagonista:</label>
        <input type="text" name="protagonist" value="<?php echo $datosPersonalizacion['nombre_protagonista']; ?>" required><br><br>
        
        <label for="best_friend">Nombre del Mejor Amig@:</label>
        <input type="text" name="best_friend" value="<?php echo $datosPersonalizacion['nombre_mejor_amigo']; ?>" required><br><br>
        
        <label for="worst_enemy">Nombre del Peor Enemig@:</label>
        <input type="text" name="worst_enemy" value="<?php echo $datosPersonalizacion['nombre_enemigo']; ?>" required><br><br>
        
        <label for="favorite_food">Comida Favorita:</label>
        <input type="text" name="favorite_food" value="<?php echo $datosPersonalizacion['comida_favorita']; ?>" required><br><br>
        
        <label for="favorite_color">Color Favorito:</label>
        <input type="text" name="favorite_color" value="<?php echo $datosPersonalizacion['color_favorito']; ?>" required><br><br>
        
        <label for="favorite_number">Número Favorito:</label>
        <input type="number" name="favorite_number" value="<?php echo $datosPersonalizacion['numero_favorito']; ?>" required><br><br>
        
        <input type="submit" value="Guardar cambios">
    </form>
    
    <?php
        include ("../../templates/footer.php");
    ?>
    

