<?php
     include ("../controllers/StoryController.php");
     session_start();
?>

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
    
    <?php
    include ("../../templates/head.php");
    ?>


        <div class="card bg-dark text-white">
            <img src="../../assets/img/wallpapers/path-7744063_1920.jpg" class="card-img-introduction" alt="...">
        <div class="card-img-overlay">          
        
        <div class="custom-font border-0 login-container mt-3 col-md-11" >
            <div class="card-body text-center">
                <h1 class="mb-3 custom-font card-title text-center">Introduce los datos de personalización</h1>


                <form action="viewPersonalizationForm.php" method="POST">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="">
                        <div class="card-body">
                        <div class="mb-3 text-start row align-items-center">  
                            <div class="col-md-3">      
                                <label for="historia_id" class="form-label d-inline-block mb-1" >Selecciona una historia:</label>
                            </div>
                            <div class="col-md-9"> 
                                <select name="historia_id" class="form-control d-inline-block">
                                    <option value="1">Historia 1</option>
                                    <option value="2">Historia 2</option>
                                </select>
                            </div>                        
                        </div>
                        </div>
                        </div>
                    </div>
                </div>             
                    

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="">
                            <div class="card-body">

                                <div class="mb-3 text-start row align-items-center">
                                    <div class="col-md-4"> 
                                        <label for="protagonist" class="form-label d-inline-block mb-1">Nombre del Protagonista:</label>
                                    </div>    
                                    <div class="col-md-8">
                                        <input type="text" name="protagonist" class="form-control d-inline-block" required>
                                    </div>
                                </div>

                                <div class="mb-3 text-start row align-items-center">
                                    <div class="col-md-4">    
                                        <label for="best_friend" class="form-label d-inline-block mb-1">Nombre del Mejor Amig@:</label>
                                    </div>
                                    <div class="col-md-8"> 
                                        <input type="text" name="best_friend" class="form-control d-inline-block" required>
                                    </div>
                                </div>

 		                        <div class="mb-3 text-start row align-items-center">
                                    <div class="col-md-4 "> 
                                        <label for="favorite_food" class="form-label d-inline-block mb-1">Tu Comida Favorita es:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="favorite_food" class="form-control d-inline-block" required>
                                    </div>
                                </div>               
                    
                            </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="">
                            <div class="card-body">

                                <div class="mb-3 text-start row align-items-center">  
                                    <div class="col-md-4">
                                        <label for="worst_enemy" class="form-label d-inline-block mb-1">Nombre del Peor Enemig@:</label>
                                    </div>  
                                    <div class="col-md-8">
                                        <input type="text" name="worst_enemy" class="form-control d-inline-block" required>
                                    </div>                          
                                </div>

                                <div class="mb-3 text-start row align-items-center">
                                    <div class="col-md-4"> 
                                        <label for="favorite_color" class="form-label d-inline-block mb-1">Tu Color Favorito es el:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="favorite_color" class="form-control d-inline-block" required>
                                    </div>
                                </div>

                                <div class="mb-3 text-start row align-items-center">
                                    <div class="col-md-4">
                                        <label for="favorite_number" class="form-label d-inline-block mb-1">Tu Número Favorito es el:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="favorite_number" class="form-control d-inline-block" required>
                                    </div>
                                </div>                            

                            </div>
                            </div>
                        </div>
                        </div>

                    <div class="mb-3">
                        <input type="submit" class="button_general" value="Enviar">
                    </div>                    

                </form>
            
        </div>
        </div>
        </div>
        </div>       
        
    <?php
    include ("../../templates/footer.php");
    ?>
     
    