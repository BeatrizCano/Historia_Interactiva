<?php
    include ("../../templates/head.php");
?>
    <form action="../../sections/generateCertificate.php" method="POST">
        <label for="name">Introduce tu nombre para el certificado:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Generar Certificado">
    </form>

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






