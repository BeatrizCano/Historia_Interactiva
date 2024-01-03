<?php
include ("../controllers/StoryController.php");
session_start();

// Iniciar sesión
if (isset($_SESSION['usuario_id'], $_SESSION['nombre_usuario'])) {
    $usuarioId = $_SESSION['usuario_id'];
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $mensajeBienvenida = "¡Bienvenid@, $nombreUsuario!";
} else {
    echo "Las claves 'usuario_id' o 'nombre_usuario' no están definidas en la sesión.";
}
?>

<?php
    include ("../../templates/head.php");
?>

    <div class="card bg-dark text-white">
        <img src="../../assets/img/wallpapers/digital-graphicscat-6747298_1920.jpg" class="card-img-introduction" alt="...">
    <div class="card-img-overlay">

    
    <div class="custom-font border-0 login-container ">
        <div class="card-body text-center">
        <div>
            <img src="../../assets/img/decorative_line.png" class="ornament_img">
        </div>

        <?php if (isset($mensajeBienvenida)) { ?>
            <h1 class="card-title text-center"><?php echo $mensajeBienvenida; ?></h1>
        <?php } else { ?>
            <h1 class="card-title text-center">¡Bienvenid@!</h1>
        <?php } ?>
        
         <h5 class="card-text text-center">Te invitamos a crear tu propia historia interactiva.</h5>
        <div class="text-container mt-2 ">                
            <p class="card-text">Ahora que tenemos tus datos, podremos guardar tu sesión y tus preferencias.
            Hablando de eso, ahora vamos a empezar con la parte divertida, necesitamos que nos ayudes a personalizar la historia. 
                Rellena el formulario que te mostramos en la siguiente vista, con los datos que quieres que figuren en tu historia.</p>
        </div>
            <div class="mt-3">
                <input type="button" class="button_general"  value="Comenzar"  onclick="window.location.href='./viewPersonalizationForm.php'"/>            
            </div>
            </div> 
        </div>
    </div>
</div>
</div>

<?php
    include ("../../templates/footer.php");
?>