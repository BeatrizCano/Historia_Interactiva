<?php

include ("../controllers/StoryController.php");
session_start();

$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
   
    $loginResult = login($email, $password);
    if ($loginResult === true) {        
        $userInfo = getUserIdAndNameForEmail($email);    
        
        $_SESSION['usuario_id'] = $userInfo['usuario_id'];
        $_SESSION['nombre_usuario'] = $userInfo['nombre_usuario'];
        header("Location: ../views/viewAfterLogin.php");
        exit();
    } else {
        $error_message = "Credenciales incorrectas"; 
    }
}
?>
<?php
include ("../../templates/head.php");
?>


<div class="card bg-dark text-white">
    <img src="../../assets/img/wallpapers/fantasy-4339663_1280.jpg" class="card-img-introduction" alt="...">
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
                        <label for="email" class="form-label d-inline-block mb-1">Email:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" class="form-control d-inline-block" id="email" name="email" placeholder="Introduce tu email" required>
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
                    <input type="submit" class="button_general" value="Enviar">
                </div>
            </form>
        </div>

        <p class="mt-3 d-inline">¿Aún no tienes una cuenta?</p>
        <p class="d-inline"><a href="./viewRegister.php" class="card-title">Registrarse</a></p>


        </div>
    </div>
</div>
</div>
</div>   


<?php
include ("../../templates/footer.php");
?>

