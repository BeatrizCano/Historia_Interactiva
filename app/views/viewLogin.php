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


<div class="card bg-dark text-white">
    <img src="../../assets/img/wallpapers/background-image.jpg" class="card-img" alt="...">
    <div class="card-img-overlay">  
        
    
    <div class="custom-font border-0 login-container" >
        <div class="card-body text-center">
            <h1 class="mb-3 custom-font card-title text-center">INICIAR SESIÓN</h1>

            <form action="viewLogin.php" method="POST">

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
                    <input type="submit" class="btn btn-light" value="Enviar" style="background-color: #e56197; color: #ffffff;">
                </div>
            </form>
        </div>

        <p class="mt-3 d-inline">¿Aún no tienes una cuenta?</p>
        <p class="d-inline"><a href="./viewRegister.php" class="card-text">Registrarse</a></p>


        </div>
    </div>
</div>
</div>
</div>   


<?php
    include ("../../templates/footer.php");
?>

