<?php
include ("../controllers/StoryController.php");
include ("../../sections/session/sessionStart.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Interactiva</title>
    <!--Enlace de bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/styles.css">
    <!--Fuente de letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
    <!--Fuente de letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
</head>
<header>
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
            <a class="nav-link" href="../../app/views/viewEditForm.php">Editar Personalización</a>           
            <a class="nav-link" href="../../sections/session/logout.php">Cerrar Sesión</a>           
        </div>
        </div>
    </div>
    </nav>
</header>
<body>

    <?php
    // Incluir tus funciones y archivos necesarios aquí

    // Obtener la primera historia de la tabla historias
    $connection = createConnection("interactive_history");
    $storyId = 1; // Cambia esto por el ID de la historia que deseas obtener

    //Para incluir todas las consultas a las tablas y la lógica
    include ("../../sections/querys/queryViewHistoryChoice.php");

    // Mostrar el título y contenido de la primera historia
    echo "<h1>$storyTitle</h1>";
    echo "<p>$storyContent</p>";
   
    ?>     

<form action="viewHistory.php" method="POST">
    <p>Elige una de las siguientes opciones:</p>
    <?php
    // Mostrar las opciones disponibles en forma de texto
    while ($optionRow = mysqli_fetch_assoc($optionsResult)) {
        $optionId = $optionRow['id_opcion'];
        $optionText = $optionRow['texto'];
        echo "<p><span style='margin-right: 5px;'>•</span>$optionText</p>";
    }
    ?>
</form>
    <br> <!-- Agrega un salto de línea para separar las dos opciones -->
    <div>
        <form action="./viewsChoice/viewFirstChoiceA.php" method="POST" style="display: inline-block; margin-right: 10px;">
            <input type="hidden" name="chosen_option" value="1">
            <button type="submit">Ir a Opción A</button>
        </form>
        <form action="./viewsChoice/viewFirstChoiceB.php" method="POST" style="display: inline-block;">
            <input type="hidden" name="chosen_option" value="2">
            <button type="submit">Ir a Opción B</button>
        </form>
    </div>

<?php
    include ("../../templates/footer.php");
?>
    

