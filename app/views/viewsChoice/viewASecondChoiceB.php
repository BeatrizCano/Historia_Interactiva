<?php
//include ("../controllers/StoryController.php");
include ("../../../config/Database.php");
//incluir el archivo de inicio de sesión
include ("../../../sections/session/sessionStart.php");
?>

<?php
    include ("../../../templates/headViewsChoice.php");
?>
     
<body>

<div class="card bg-dark text-white">
    <img src="../../../assets/img/wallpapers/elephant-1217313_1280.png" class="card-img" alt="...">
    <div class="card-img-overlay">
        <div class="custom-font border-0 login-container-history text-container">
            <div class="card-body text-center">
                <div id="carouselExample" class="carousel slide" data-bs-interval="false">
                <div>
                    <img src="../../../assets/img/Filigrana.png" class="ornament_history_img">
                </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <?php
                                // Incluir tus funciones y archivos necesarios aquí

                                // Obtener la historia 2 de la tabla historias
                                $connection = createConnection("interactive_history");
                                $storyId = 5; // Cambia esto por el ID de la historia que deseas obtener

                                //Para incluir todas las consultas a las tablas y la lógica
                                include ("../../../sections/querys/queryViewHistoryChoice.php");

                                // Mostrar el título y contenido de la primera historia
                                echo "<h1 class='card-title text-center'>$storyTitle</h1>";
                                echo "<p>$storyContent</p>";

                            ?>     

                        </div>

                        <div class="carousel-item">

                            <form action="viewHistory.php" method="POST">
                                <h2 class='card-title text-center'>Elige una de las siguientes opciones:</h2>
                                <?php
                                $connection = createConnection("interactive_history");

                                // Para incluir todas las consultas a las tablas y la lógica
                                include("../../../sections/querys/queryViewOptions.php");

                                // Imprimir todos los textos de opciones
                                foreach ($optionTexts as $optionText) {
                                    echo "<p class='text-start'>$optionText</p>";
                                }
                                ?>
                            </form>

                            <div>
                                <form action="../viewFinals/viewFinalsA/viewFinalABChoiceA.php" method="POST" style="display: inline-block; margin-right: 10px;">
                                    <input type="hidden" name="chosen_option" value="1">
                                    <button type="submit" class="button_options">Ir a final A</button>
                                </form>
                                <form action="../viewFinals/viewFinalsA/viewFinalABChoiceB.php" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="chosen_option" value="2">
                                    <button type="submit" class="button_options">Ir a final B</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
   

<?php
    include ("../../../templates/footer.php");
?>
    

