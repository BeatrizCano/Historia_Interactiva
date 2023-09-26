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

   

    <link rel="stylesheet" href="../../public/css/style.css">

    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center custom-div">
                <div class="card custom-font mt-3 border-0" style="background-color: #F5F5DC;">
                    <img src="../../assets/img/wallpapers/book-fantasy-1.jpg" class="img-fluid custom-image" style="height: 80vh;" alt="...">
                </div>
            </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="card custom-font border-0" style="background-color: #F5F5DC;">

            <div class="card-body text-center">

            <?php if (isset($mensajeBienvenida)) { ?>
                <h1 class="card-title"><?php echo $mensajeBienvenida; ?></h1>
            <?php } else { ?>
                <h1 class="card-title">¡Bienvenid@!</h1>
            <?php } ?>

            <h3 class="card-title">Te invitamos a crear tu propia historia interactiva</h3>
            <p class="card-text">Ahora que tenemos tus datos, podremos guardar tu sesión y tus preferencias. <br>
                Hablando de eso, ahora vamos a empezar con la parte divertida, necesitamos que nos ayudes a personalizar la historia. <br> 
            Rellena el formulario que te mostramos en la siguiente vista, con los datos que quieres que figuren en tu historia</p>
            
            <div class="">
            <input type="button" class="btn" value="¡Vamos a ello!"  onclick="window.location.href='./viewPersonalizationForm.php'" style="background-color: #4169E1; color: #ffffff; font-size: 1.2em;">
            </div>

            </div>
        </div>
        </div>
        </div>
    </div>

<?php
    include ("../../templates/footer.php");
?>
