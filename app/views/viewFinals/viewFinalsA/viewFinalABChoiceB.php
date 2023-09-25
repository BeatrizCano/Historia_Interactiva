<?php
include ("../../../../config/Database.php");
//incluir el archivo de inicio de sesión
include ("../../../../sections/session/sessionStart.php");

?>

<?php
    include ("../../../../templates/headViewsFinals.php");
?>
    <?php
        // Incluir tus funciones y archivos necesarios aquí

        // Obtener el final A de la historia 4 de la tabla finales
        $connection = createConnection("interactive_history");
        // Obtener el final A de la historia 4 de la tabla finales
        $storyId = 5; // Cambia esto por el ID de la historia que deseas obtener

       //Para incluir todas las consultas a las tablas y la lógica
    include ("../../../../sections/querys/queryViewBFinals.php");

    // Mostrar el texto del final A
    echo "<h1>¡Final B de la historia!</h1>";
    echo "<p>$finalAText</p>";

    ?>
    <?php
        include ("../../../../templates/footer.php");
    ?>    

