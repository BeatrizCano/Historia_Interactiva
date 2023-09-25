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

    <?php if (isset($mensajeBienvenida)) { ?>
        <h1><?php echo $mensajeBienvenida; ?></h1>
    <?php } else { ?>
        <h1>¡Bienvenid@!</h1>
    <?php } ?>

    <h3>Te invitamos a crear tu propia historia interactiva</h3>
    <p>Ahora que tenemos tus datos, podremos guardar tu sesión y tus preferencias. <br>
        Hablando de eso, ahora vamos a empezar con la parte divertida, necesitamos que nos ayudes a personalizar la historia. <br> 
    Rellena el formulario que te mostramos en la siguiente vista, con los datos que quieres que figuren en tu historia</p>
    <h3><a href="./viewPersonalizationForm.php">¡Vamos a ello!</a></h3>

<?php
    include ("../../templates/footer.php");
?>
    