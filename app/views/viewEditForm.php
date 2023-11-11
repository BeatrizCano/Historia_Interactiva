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

        <div class="card bg-dark text-white">
            <img src="../../assets/img/wallpapers/background-image.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">          
        
        <div class="custom-font border-0 login-container mt-3" >
            <div class="card-body text-center">
                <h1 class="mb-3 custom-font card-title text-center">Edición de Personalización</h1>


                <form action="viewEditForm.php" method="POST">

                    
                    <div class="mb-3 text-start row align-items-center">
                        <div class="col-md-4"> 
                            <input type="hidden" name="historia_id" class="form-control d-inline-block" value="<?php echo $datosPersonalizacion['id_historia']; ?>">
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
                                        <input type="text" name="protagonist" class="form-control d-inline-block" value="<?php echo $datosPersonalizacion['nombre_protagonista']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 text-start row align-items-center">
                                    <div class="col-md-4"> 
                                        <label for="best_friend" class="form-label d-inline-block mb-1">Nombre del Mejor Amig@:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="best_friend" class="form-control d-inline-block" value="<?php echo $datosPersonalizacion['nombre_mejor_amigo']; ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 text-start row align-items-center">
                                    <div class="col-md-4"> 
                                        <label for="favorite_food" class="form-label d-inline-block mb-1">Tu comida Favorita es:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="favorite_food" class="form-control d-inline-block" value="<?php echo $datosPersonalizacion['comida_favorita']; ?>" required>
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
                                            <input type="text" name="worst_enemy" class="form-control d-inline-block" value="<?php echo $datosPersonalizacion['nombre_enemigo']; ?>" required>
                                        </div>
                                    </div> 

                                    <div class="mb-3 text-start row align-items-center">
                                        <div class="col-md-4"> 
                                            <label for="favorite_color" class="form-label d-inline-block mb-1">Tu Color Favorito es el:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="favorite_color" class="form-control d-inline-block" value="<?php echo $datosPersonalizacion['color_favorito']; ?>" required>
                                        </div>
                                    </div> 

                                    <div class="mb-3 text-start row align-items-center">
                                        <div class="col-md-4"> 
                                            <label for="favorite_number" class="form-label d-inline-block mb-1">Tu Número Favorito es el:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="number" name="favorite_number" class="form-control d-inline-block" value="<?php echo $datosPersonalizacion['numero_favorito']; ?>" required>
                                        </div>
                                    </div>              
                                </div>
                                </div>
                            </div>
                            </div>         
            
                    <div class="mb-3">
                        <input type="submit" class="btn btn-light" value="Guardar cambios" style="background-color: #e56197; color: #ffffff;">
                    </div>    
                </form>

        </div>
        </div>
        </div>
        </div>
        
    
    <?php
        include ("../../templates/footer.php");
    ?>
    

