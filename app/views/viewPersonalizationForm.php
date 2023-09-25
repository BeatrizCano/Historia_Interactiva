<?php
     include ("../controllers/StoryController.php");
     session_start();
?>
<!--No quitar el encabezado html aquí por el header del formulario, da fallos con el include del head-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Interactiva</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="../../assets/img/logoPaper.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Historia Interactiva
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
            <a class="nav-link" href="../../app/views/viewRegister.php">Registrarse</a>
            <a class="nav-link" href="../../app/views/viewLogin.php">Iniciar Sesión</a>           
            <a class="nav-link" href="../../sections/session/logout.php">Cerrar Sesión</a>           
        </div>
        </div>
    </div>
    </nav>
    <form action="viewPersonalizationForm.php" method="POST">
       
        <label for="historia_id">Selecciona una historia:</label>
        <select name="historia_id">
            <option value="1">Historia 1</option>
            <!-- Agrega más opciones para futuras historias -->
             <!--<option value="2">Historia 2</option>-->
        </select><br><br>

        <label for="protagonist">Nombre del Protagonista:</label>
        <input type="text" name="protagonist" required><br><br>

        <label for="best_friend">Nombre del Mejor Amig@:</label>
        <input type="text" name="best_friend" required><br><br>

        <label for="worst_enemy">Nombre del Peor Enemig@:</label>
        <input type="text" name="worst_enemy" required><br><br>

        <label for="favorite_food">Comida Favorita:</label>
        <input type="text" name="favorite_food" required><br><br>

        <label for="favorite_color">Color Favorito:</label>
        <input type="text" name="favorite_color" required><br><br>

        <label for="favorite_number">Número Favorito:</label>
        <input type="number" name="favorite_number" required><br><br>

        <input type="submit" value="Enviar">
    </form>
    <br>
    <!-- Agregar un botón de "Editar" que redirige a la vista de edición -->
    <p>Haz click en el enlace para editar los datos de la personalización: <a href="viewEditForm.php">Editar</a> </p>  
    
    <?php 

    if(isset($_POST["protagonist"], $_POST["best_friend"], $_POST["worst_enemy"], $_POST["favorite_food"], $_POST["favorite_color"], $_POST["favorite_number"], $_POST["historia_id"])) {
        $protagonist = $_POST["protagonist"];
        $bestFriend = $_POST["best_friend"];
        $worstEnemy = $_POST["worst_enemy"];
        $favoriteFood = $_POST["favorite_food"];
        $favoriteColor = $_POST["favorite_color"];
        $favoriteNumber = $_POST["favorite_number"];
        $historiaId = $_POST["historia_id"];
        
        // para almacenar la sesión de usuario
        $usuarioId = $_SESSION['usuario_id'];
        personalizationData($usuarioId, $historiaId, $protagonist, $bestFriend, $worstEnemy, $favoriteFood, $favoriteColor, $favoriteNumber);

        // Redirigir al usuario a la vista view_story.php
        header("Location: ../views/viewAfterPersonalizationForm.php");
    
        
    }    
    ?>
    <!--Fuente de letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
    <!--Fuente de letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
    <?php
    include ("../../templates/footer.php");
    ?>
    