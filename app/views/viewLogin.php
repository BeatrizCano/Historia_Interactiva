<!-- view_login.php -->
<?php

include ("../controllers/StoryController.php");
session_start();

$error_message = ""; // Variable para almacenar el mensaje de error

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Llamar a la función login() para verificar las credenciales
    $loginResult = login($name, $password);
    if ($loginResult === true) {
        // Obtener el usuario_id y el nombre de usuario
        $userInfo = getUserIdAndNameForName($name);
    
        // Credenciales válidas, establecer las variables de sesión
        $_SESSION['usuario_id'] = $userInfo['usuario_id'];
        $_SESSION['nombre_usuario'] = $userInfo['nombre_usuario'];
        header("Location: ../views/viewAfterLogin.php");
        exit();
    } else {
        $error_message = "Nombre de usuario o contraseña incorrectos"; // Asignar mensaje de error
    }
}
?>
<?php
    include ("../../templates/head.php");
?>

    <h1>Iniciar Sesión</h1>
    
    <form class="" action="viewLogin.php" method="POST">
        <div class="alert <?php echo (!empty($error_message)) ? 'alert-danger' : 'd-none'; ?>" role="alert">
            <?php if (!empty($error_message)) { ?>
                <p><?php echo $error_message; ?></p>
            <?php } ?>
        </div>
            <div>
            <label for="name">Nombre de usuario:</label>
            <input type="text" name="name" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <br>
            <input type="submit" value="Iniciar Sesión">
        </div>       
    </form>
    <p>¿Aún no tienes una cuenta? <a href="./viewRegister.php">Registrarse</a></p>

    <?php
        include ("../../templates/footer.php");
    ?>

