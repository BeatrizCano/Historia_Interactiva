<!--restringido a introducir la dirección de email una sola vez al registrarse-->
<?php
include ("../controllers/StoryController.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verificar si el correo electrónico ya está registrado
    if (isEmailRegistered($email)) {
        $error_message = "El correo electrónico ya está registrado.";
    } else {
        // Llamar a la función registerUser() y luego iniciar sesión con el usuario recién registrado
        if (registerUser($name, $email, $password)) {
            $userInfo = getUserIdAndNameForName($name);
            $_SESSION['usuario_id'] = $userInfo['usuario_id'];
            $_SESSION['nombre_usuario'] = $userInfo['nombre_usuario'];
            header("Location: ./viewLogin.php");
            exit();
        } else {
            $error_message = "Error al registrar el usuario.";
        }
    }
}
?>

<?php
    include ("../../templates/head.php");
?>

    <h1>Registro de Usuario</h1>
    <form class="" action="viewRegister.php" method="POST">
        <div class="input">
        <div class="alert <?php echo (!empty($error_message)) ? 'alert-danger' : 'd-none'; ?>" role="alert">
            <?php if (!empty($error_message)) { ?>
                <p><?php echo $error_message; ?></p>
            <?php } ?>
        </div>  
            <input name="name" type="text" placeholder="Nombre" required><br>
            <input name="email" type="email" placeholder="Email" required><br>
            <input name="password" type="password" placeholder="Password" required><br>
        </div>
            <button class="">Enviar</button>
            <p>¿Ya tienes una cuenta? <a href="./viewLogin.php">Iniciar Sesión</a></p>
    </form>

    <?php
        include ("../../templates/footer.php");
    ?>

