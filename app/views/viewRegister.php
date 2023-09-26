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

<link rel="stylesheet" href="../../public/css/style.css">

<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center justify-content-center custom-div">
            <div class="card custom-font mt-3 border-0" style="background-color: #F5F5DC;">
                <img src="../../assets/img/wallpapers/photo-book-1318702_1920.png" class="img-fluid custom-image" style="height: 80vh;" alt="...">
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
    <div class="card custom-font border-0" style="background-color: #F5F5DC;">
        <div class="card-body text-center">


    <h1 class="mb-5 custom-font card-title">Registro de Usuario</h1>
    <div class="col-md-12 mx-auto">
        <form class="" action="viewRegister.php" method="POST">
            
            <div class="alert <?php echo (!empty($error_message)) ? 'alert-danger' : 'd-none'; ?>" role="alert">
                <?php if (!empty($error_message)) { ?>
                    <p><?php echo $error_message; ?></p>
                <?php } ?>
            </div>  

            <div class="mb-3 text-start row align-items-center">
                <div class="col-md-3">
                    <label for="name" class="form-label d-inline-block mb-1">Usuario:</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control d-inline-block" id="name" name="name" placeholder="Introduce tu nombre" required>
                </div>
            </div>

            <div class="mb-3 text-start row align-items-center">
                <div class="col-md-3">
                    <label for="email" class="form-label d-inline-block mb-1">Email:</label>
                </div>
                <div class="col-md-9">
                    <input type="email" class="form-control d-inline-block" name="email" id="email" placeholder="Introduce tu email" required>  
                </div>                    
            </div>

            <div class="mb-3 text-start row align-items-center">
                <div class="col-md-4">
                    <label for="password" class="form-label d-inline-block mb-1">Contraseña:</label>
                </div>
                <div class="col-md-8">
                    <input type="password" class="form-control d-inline-block" name="password" id="password" placeholder="Introduce tu contraseña" required>  
                </div>                    
            </div>

            <div class="mb-3 form-check text-start">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Recuérdame</label>
            </div>

            <div class="d-grid">
                <input type="submit" class="btn" value="Enviar" style="background-color: #4169E1; color: #ffffff;>
            </div>

        </form>
    </div>
        <p class="mt-3">¿Ya tienes una cuenta? <a href="./viewLogin.php">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
    </div>
</div>

    <?php
        include ("../../templates/footer.php");
    ?>

