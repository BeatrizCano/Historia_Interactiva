<?php
include ("../../../../config/Database.php");
include ("../../../../sections/session/sessionStart.php");
?>

<?php
include ("../../../../templates/headViewsFinals.php");
?>

<body>

<div class="card bg-dark text-white">
    <img src="../../../../assets/img/wallpapers/cat-3552048_1280.png" class="card-img" alt="...">
    <div class="card-img-overlay">
        <div class="custom-font border-0 login-container-history text-container">
            <div class="card-body text-center">
                <div id="carouselExample" class="carousel slide" data-bs-interval="false">
                <div>
                    <img src="../../../../assets/img/decorative_line.png" class="ornament_img">
                </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <?php                            
                                $connection = createConnection("interactive_history");                              
                                $storyId = 4; 
                                include ("../../../../sections/querys/queryViewAFinals.php");
                                echo "<h1 class='card-title text-center'>Un final inesperado...</h1>";
                                $finalAText = str_replace('\n', '<br>', $finalAText);
                                echo "<p class='text-start'>$finalAText</p>";
                            ?>  
                        </div>

                        <div class="carousel-item mt-3">
                            
                            <p>Enhorabuena, has llegado al final de la historia. Espero que te haya gustado mucho. 
                                Recuerda que si quieres seguir probando más opciones, puedes volver al inicio y volver a comenzar la historia. 
                                Cómo premio, te hacemos entrega de tu certificado de participación. ¡Estamos muy orgullos@s!</p>
                            <h3><a class="card-title" href="../../viewCertificateForm.php">Ir a certificado</a></h3>                            
                            <br> 
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
    include ("../../../../templates/footer.php");
?>  
    


