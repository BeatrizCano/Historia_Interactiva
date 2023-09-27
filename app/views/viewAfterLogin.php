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

    <link rel="stylesheet" href="../../public/css/styles1.css">

   
    <div class="card bg-dark text-white">
    <img src="../../assets/img/wallpapers/background-image.jpg" class="card-img" alt="...">
    <div class="card-img-overlay">

        <?php if (isset($mensajeBienvenida)) { ?>
            <h1 class="card-title"><?php echo $mensajeBienvenida; ?></h1>
        <?php } else { ?>
            <h1 class="card-title">¡Bienvenid@!</h1>
        <?php } ?>

        <h5 class="card-title">Te invitamos a crear tu propia historia interactiva.</h5>
        
        <div class="text-container">        
        <p class="card-text">Ahora que tenemos tus datos, podremos guardar tu sesión y tus preferencias.
        Hablando de eso, ahora vamos a empezar con la parte divertida, necesitamos que nos ayudes a personalizar la historia. 
            Rellena el formulario que te mostramos en la siguiente vista, con los datos que quieres que figuren en tu historia.</p>
        </div>
        <div class="mt-3">
            <input type="button" class="btn-lg btn-light" value="¡Vamos a ello!"  onclick="window.location.href='./viewPersonalizationForm.php'" style="background-color: #8B4513; color: #fff"/>            
        </div>

    </div>
    </div>
       
     

<?php
    include ("../../templates/footer.php");
?>
