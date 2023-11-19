<?php
//include ("../controllers/StoryController.php");
include ("../../../config/Database.php");
//incluir el archivo de inicio de sesión
include ('../../../sections/session/sessionStart.php');

?>

<?php
    include ("../../../templates/headViewsChoice.php");
?>


<body>

<div class="card bg-dark text-white">
    <img src="../../../assets/img/ilustracion-de-dibujos-animados-de-elefante-bebe.jpg" class="card-img" alt="...">
    <div class="card-img-overlay">
        <div class="custom-font border-0 login-container-history text-container">
            <div class="card-body text-center">
                <div id="carouselExample" class="carousel slide" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <?php
                                // Incluir tus funciones y archivos necesarios aquí

                                // Obtener la historia 2 de la tabla historias
                                $connection = createConnection("interactive_history");
                                $storyId = 4; // Cambia esto por el ID de la historia que deseas obtener

                                //Para incluir todas las consultas a las tablas y la lógica
                                include ("../../../sections/querys/queryViewHistoryChoice.php");

                                // Mostrar el título y contenido de la primera historia
                                echo "<h1>$storyTitle</h1>";
                                echo "<p>$storyContent</p>";

                            ?>     

                        </div>

                        <div class="carousel-item">

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
                            <form action="../viewFinals/viewFinalsA/viewFinalAAChoiceA.php" method="POST" style="display: inline-block; margin-right: 10px;">
                                <input type="hidden" name="chosen_option" value="1">
                                <button type="submit">Ir a final A</button>
                            </form>
                            <form action="../viewFinals/viewFinalsA/viewFinalAAChoiceB.php" method="POST" style="display: inline-block;">
                                <input type="hidden" name="chosen_option" value="2">
                                <button type="submit">Ir a final B</button>
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
    

