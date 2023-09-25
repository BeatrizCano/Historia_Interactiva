<?php
//session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Interactiva</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <!--Fuente de letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">
    <!--Fuente de letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Mulish:wght@200;300;400&display=swap" rel="stylesheet">

</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #F5F5DC;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="./assets/img/logoPaper.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Historia Interactiva
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
            <a class="nav-link" href="./app/views/viewRegister.php">Registrarse</a>
            <a class="nav-link" href="./app/views/viewLogin.php">Iniciar Sesión</a>           
            <a class="nav-link" href="./sections/session/logout.php">Cerrar Sesión</a>           
        </div>
        </div>
    </div>
    </nav>

    <div class="container">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center justify-content-center custom-div">
            <div class="card custom-font mt-3 border-0" style="background-color: #F5F5DC;">
                <img src="./assets/img/wallpapers/photo-book-1318702_1920.png" class="img-fluid custom-image" style="height: 80vh;" alt="...">
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="card custom-font border-0" style="background-color: #F5F5DC;">
                <div class="card-body text-center">
                    <h1 class="card-title pb-3">Bienvenido a Historia Interactiva</h1>                    
                    <p class="card-text">Aquí podrás explorar emocionantes historias personalizadas, en las que tú serás el protagonista.</p>
                    <p class="card-text">Hoy te ofrecemos un cuento clásico, que trata de un reino gobernado por l@s gat@s, con la ayuda de una Inteligencia Artificial 
                    que dirige a un ejército de robots. Sus aliados son l@s elefant@s, que habitan en un reino próximo. Y sus enemigos naturales son l@s raton@s, a quienes pertenecían las tierras 
                    en la antigüedad.</p>
                    <p class="card-text"> Nuestro protagonista es un@ pequeñ@ elefant@ recién llegado al reino de l@s gat@s. Las decisiones que tome, decidirán el futuro del mundo que conocen, para bien o para mal. 
                        ¿Quieres ayudarle a decidir sabiamente? Su futuro está ahora en tus manos.</p>
                    <p class="card-text" style="color: #4169E1;">Por favor, regístrate o inicia sesión para comenzar la aventura. ¡Vamos a ello!</p>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
        include ("./templates/footer.php");
    ?>
    <script src="./public/js/script.js"></script>
</body>
</html>