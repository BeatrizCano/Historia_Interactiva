<?php
    include ("../../templates/head.php");
?>

<div class="card bg-dark text-white">
    <img src="../../assets/img/wallpapers/flower-7111468_1920.jpg" class="card-img-introduction" alt="...">
<div class="card-img-overlay">    

<div class="custom-font border-0 login-container mt-3" >
            <div class="card-body text-center">


        <form id="certificateForm" action="../../sections/generateCertificate.php" method="POST" target="_blank">

        <div class="mb-4 text-start row align-items-center">        
            <div class="col-md-7">
                <label for="name" class=" d-inline-block mb-1 card-title">Introduce tu nombre para el certificado:</label>
            </div>
            <div class="col-md-5">
                <input type="text" name="name" class="form-control d-inline-block" placeholder="Introduce tu nombre" required>
            </div>           
        </div>
        <div>
            <input type="submit" class="button_general w-100" value="Generar Certificado">
        </div>
    </form>

    <!-- Botón para volver a la historia después de enviar el formulario -->
    <div class="mt-3">
        <button class="button_certificate w-100" onclick="redirectToHistory()">Volver a la historia</button>
    </div>
    
</div> 
    </div>
</div>
</div>
</div>

    <?php
        include ("../../templates/footer.php");
    ?>    
        

<script>
    document.getElementById('certificateForm').addEventListener('submit', function() {
        // No se requiere window.open aquí
    });
</script>

<script>
function redirectToHistory() {
    window.location.href = "../views/viewAfterPersonalizationForm.php";
}
</script>       




