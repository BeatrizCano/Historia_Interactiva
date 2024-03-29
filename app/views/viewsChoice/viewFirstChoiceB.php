<?php
include ("../../../config/Database.php");
include ("../../../sections/session/sessionStart.php");
?>

<?php
include ("../../../templates/headViewsChoice.php");
?>
   
<body>

<div class="card bg-dark text-white">
    <img src="../../../assets/img/wallpapers/elephant-scared.png" class="card-img-small" alt="...">
    <div class="card-img-overlay">
        <div class="custom-font border-0 login-container-history text-container  col-md-9">
            <div class="card-body text-center">
                <div id="carouselExample" class="carousel slide" data-bs-interval="false">
                <div>
                    <img src="../../../assets/img/decorative_line.png" class="ornament_img">
                </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <?php
                               
                                $connection = createConnection("interactive_history");
                                $storyId = 3; 
                               
                                include ("../../../sections/querys/queryViewHistoryChoice.php");
                               
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
                               
                                include("../../../sections/querys/queryViewOptions.php");
                              
                                foreach ($optionTexts as $optionText) {
                                    $optionText = str_replace('\n', '<br>',  $optionText);
                                    echo "<p class='text-start'>$optionText</p>";
                                }
                                ?>
                                
                            </form>

                            <div>
                                <form action="viewBSecondChoiceA.php" method="POST" style="display: inline-block; margin-right: 10px;">
                                    <input type="hidden" name="chosen_option" value="1">
                                    <button type="submit" class="button_options">Ir a Opción A</button>
                                </form>
                                <form action="viewBSecondChoiceB.php" method="POST" style="display: inline-block;">
                                    <input type="hidden" name="chosen_option" value="2">
                                    <button type="submit" class="button_options">Ir a Opción B</button>
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
    include ("../../../templates/footer.php");
?>
    

