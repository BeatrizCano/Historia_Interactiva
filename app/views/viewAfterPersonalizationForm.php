<?php
include ("../controllers/StoryController.php");
session_start();

// Iniciar sesión
if (isset($_SESSION['usuario_id'], $_SESSION['nombre_usuario'])) {
    $usuarioId = $_SESSION['usuario_id'];
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $mensajeBienvenida = "¡Eso ha estado genial, $nombreUsuario!";
} else {
    echo "Las claves 'usuario_id' o 'nombre_usuario' no están definidas en la sesión.";
}
?>

<?php
    // Obtener la primera historia de la tabla historias
    $connection = createConnection("interactive_history");

    // Obtener los datos de personalización del usuario desde la tabla personalizacion_historia
    $userId = $_SESSION['usuario_id'];
    $personalizationSql = "SELECT nombre_protagonista, nombre_mejor_amigo, nombre_enemigo, comida_favorita, color_favorito, numero_favorito
     FROM personalizacion_historia WHERE usuario_id = ?";
    $stmt = mysqli_prepare($connection, $personalizationSql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $protagonistName = $row['nombre_protagonista'];
        $bestFriendName = $row['nombre_mejor_amigo'];
        $enemyName = $row['nombre_enemigo'];
        $favoriteFood = $row['comida_favorita'];
        $favoriteColor = $row['color_favorito'];
        $favoriteNumber = $row['numero_favorito'];
    } else {
        // Manejar el caso en que no se encuentren datos de personalización
    }
    mysqli_stmt_close($stmt);
    
    // Resto de tu código...
?>

<?php
    include ("../../templates/head.php");
?>

<div class="card bg-dark text-white">
    <img src="../../assets/img/wallpapers/background-image.jpg" class="card-img" alt="...">
<div class="card-img-overlay">          
        
<div class="custom-font border-0 login-container " >
    <div class="card-body text-center">
        
        <?php if (isset($mensajeBienvenida)) { ?>
            <h1 class="mb-3 custom-font card-title text-center"><?php echo $mensajeBienvenida; ?></h1>
            <?php } else { ?>
            <h1>¡Eso ha estado genial!</h1>
        <?php } ?>
 
        <div>
            <h3>¡Gracias por personalizar tu historia!</h3>
            <p class="text-center">Ahora te mostraremos brevemente las elecciones que has tomado:</p>
        </div>   

    
        <section>           
            <div class="row">
                <div class="col-sm-6">
                    <div class="">
                        <div class="card-body">

                            <div class="mb-3 text-start row align-items-center">
                                <div class="col-md-12"> 
                                <label class="form-label d-inline-block mb-1">
                                    <span class="card-title">Nombre del Protagonista:</span> <?php echo $protagonistName; ?>
                                </label>
                                </div>  
                                <div></div>                                 
                            </div>

                            <div class="mb-3 text-start row align-items-center">
                                <div class="col-md-12">                                    
                                    <label class="form-label d-inline-block mb-1">
                                        <span class="card-title">Nombre de su Mejor Amig@:</span> <?php echo $bestFriendName; ?>
                                    </label>
                                </div> 
                                <div></div>    
                            </div>

                            <div class="mb-3 text-start row align-items-center">
                                <div class="col-md-12"> 
                                    <label class="form-label d-inline-block mb-1">
                                        <span class="card-title">Su color Favorito:</span> <?php echo $favoriteColor; ?>
                                    </label>
                                </div> 
                                <div></div>    
                            </div>

                        </div>
                    </div>
                </div>
    
                <div class="col-sm-6">
                    <div class="">
                        <div class="card-body">

                            <div class="mb-3 text-start row align-items-center">
                                <div class="col-md-12"> 
                                    <label class="form-label d-inline-block mb-1">
                                    <span class="card-title">Nombre de su Enemig@:</span> <?php echo $enemyName; ?></label>
                                </div>  
                                <div></div>                              
                            </div>

                            <div class="mb-3 text-start row align-items-center">
                                <div class="col-md-12"> 
                                    <label class="form-label d-inline-block mb-1">
                                    <span class="card-title">Su Comida Favoríta:</span> <?php echo $favoriteFood; ?></label>
                                </div> 
                                <div></div>     
                            </div>

                            <div class="mb-3 text-start row align-items-center">
                                <div class="col-md-12"> 
                                    <label class="form-label d-inline-block mb-1">
                                    <span class="card-title">Su Número Favorito:</span> <?php echo $favoriteNumber; ?></label>
                                </div>  
                                <div></div>  
                            </div>

                        </div>
                    </div>
                </div>
            </div> 
        </section>   

    
    <p>¿Te gustan tus elecciones? Si es así haz click en <a class="card-color-green" href="./viewHistory.php">¡Comencemos la historia!</a></p>
    <p>¿Prefieres cambiar algun dato? Haz click en <a class="card-color-green" href="./viewEditForm.php">Editar</a></p>
        
    </div>
        </div>
        </div>
        </div>  
       

<?php
    include ("../../templates/footer.php");
?>
