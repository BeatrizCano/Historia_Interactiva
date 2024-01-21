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
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="stylesheet" href="../../public/css/styles9.css">
    
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
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="../../index.php">Inicio</a>
            <a class="nav-link" href="../../app/views/viewRegister.php">Registrarse</a>
            <a class="nav-link" href="../../app/views/viewLogin.php">Iniciar Sesión</a>  
            <a class="nav-link" href="../../app/views/viewEditForm.php">Editar personalización</a>         
            <a class="nav-link" href="../../sections/session/logout.php">Cerrar Sesión</a>           
        </div>
        </div>
    </div>
    </nav>

    <div class="card bg-dark text-white">
        <img src="../../assets/img/wallpapers/Elephant_face.png" class="card-img-small" alt="...">
        <div class="card-img-overlay">
            <div class="custom-font border-0 login-container-history text-container col-md-9 ">
                <div class="card-body text-center">
                    <div id="carouselExample" class="carousel slide" data-bs-interval="false">

                <div>
                    <img src="../../assets/img/decorative_line.png" class="ornament_img">
                </div>

                    <div class="carousel-inner">                        
                        <div class="carousel-item active">
                            

                            <?php
                            // Incluir tus funciones y archivos necesarios aquí

                            // Obtener la primera historia de la tabla historias
                            $connection = createConnection("interactive_history");
                            $storyId = 1; // Cambia esto por el ID de la historia que deseas obtener

                            //Para incluir todas las consultas a las tablas y la lógica
                            include ("../../sections/querys/queryViewHistoryChoice.php");

                            // Mostrar el título y contenido de la primera historia
                            echo "<h1 class='card-title text-center'>$storyTitle</h1>";
                            $storyContent = str_replace('\n', '<br>', $storyContent);
                            echo "<p class='text-start'>$storyContent</p>";
                                                  
                            ?>     
                        </div>

                        <div class="carousel-item">

                            <form action="viewHistory.php" method="POST">
                                <h2 class='card-title text-center'>Elige una de las siguientes opciones:</h2>
                                <?php
                                $connection = createConnection("interactive_history");

                                // Para incluir todas las consultas a las tablas y la lógica
                                include("../../sections/querys/queryViewOptions.php");

                                // Imprimir todos los textos de opciones
                                foreach ($optionTexts as $optionText) {
                                    $optionText = str_replace('\n', '<br>',  $optionText);
                                    echo "<p class='text-start'>$optionText</p>";
                                }
                                ?>
                            </form>

                            <div>
                                <form action="./viewsChoice/viewFirstChoiceA.php" method="POST" style="display: inline-block; margin-right: 10px;">
                                    <input type="hidden" name="chosen_option" value="1">
                                    <button type="submit" class="button_options">Ir a Opción A</button>
                                </form>
                                <form action="./viewsChoice/viewFirstChoiceB.php" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="chosen_option" value="2">
                                    <button type="submit" class="button_options" >Ir a Opción B</button>
                                </form>
                            </div>                   
                        </div>
                    </div>
                </div>
                <div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" >
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

   

<?php
    include ("../../templates/footer.php");
?>
    

