<?php
    include ("../../templates/head.php");
?>

<div class="card bg-dark text-white">
    <img src="../../assets/img/wallpapers/magical-forest-7443155_1280.jpg" class="card-img-introduction" alt="...">
<div class="card-img-overlay">    

<div class="custom-font border-0 login-container mt-3" >
            <div class="card-body text-center">


    <form action="../../sections/generateCertificate.php" method="POST">

        <div class="mb-4 text-start row align-items-center">        
            <div class="col-md-7">
                <label for="name" class=" d-inline-block mb-1 card-title  text-certificate">Introduce tu nombre para el certificado:</label>
            </div>
            <div class="col-md-5">
                <input type="text" name="name" class="form-control d-inline-block" placeholder="Introduce tu nombre" required>
            </div>           
        </div>
        <div class="">
            <input type="submit" class="button_general" value="Generar Certificado">
        </div>
    </form>

    </div>
</div>
</div>
</div>


    <?php
        include ("../../templates/footer.php");
    ?>    
        

<!-- Mostrar el mensaje de éxito si el certificado se ha generado -->
<!--El mensaje de éxito se mostrará en la misma vista del formulario después de que el usuario haya generado y descargado el certificado-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST["name"];
    
    // Genera una imagen del certificado con el nombre
    $certificateImg = generateCertificateImage($name);
    
    // Descargar la imagen del certificado generada
    header('Content-Disposition: attachment; filename="certificadoHistoriaInteractiva.png"');
    header("Content-type: image/png");
    imagepng($certificateImg);
    imagedestroy($certificateImg);

    // Mostrar el mensaje de éxito
    //echo '<p>¡Certificado generado y descargado exitosamente!</p>';
}
?>







