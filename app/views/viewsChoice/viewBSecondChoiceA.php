<?php
//include ("../controllers/StoryController.php");
include ("../../../config/Database.php");
//incluir el archivo de inicio de sesión
include ("../../../sections/session/sessionStart.php");
?>

<?php
    include ("../../../templates/headViewsChoice.php");
?>
    <?php
    // Incluir tus funciones y archivos necesarios aquí

    // Obtener la historia 2 de la tabla historias
    $connection = createConnection("interactive_history");
    $storyId = 6; // Cambia esto por el ID de la historia que deseas obtener

    //Para incluir todas las consultas a las tablas y la lógica
    include ("../../../sections/querys/queryViewHistoryChoice.php");

    // Mostrar el título y contenido de la primera historia
    echo "<h1>$storyTitle</h1>";
    echo "<p>$storyContent</p>";
    ?>     

<form action="viewHistory.php" method="POST">
    <p>Elige una de las siguientes opciones:</p>
    <?php
    // Mostrar las opciones disponibles en forma de texto
    while ($optionRow = mysqli_fetch_assoc($optionsResult)) {
        $optionId = $optionRow['id_opcion'];
        $optionText = $optionRow['texto'];
        echo "<p><span style='margin-right: 5px;'>•</span>$optionText</p>";
    }
    ?>
</form>
<br> <!-- Agrega un salto de línea para separar las dos opciones -->
<div>
    <form action="../viewFinals/viewFinalsB/viewFinalBAChoiceA.php" method="POST" style="display: inline-block; margin-right: 10px;">
        <input type="hidden" name="chosen_option" value="1">
        <button type="submit">Ir a final A</button>
    </form>
    <form action="../viewFinals/viewFinalsB/viewFinalBAChoiceB.php" method="POST" style="display: inline-block;">
        <input type="hidden" name="chosen_option" value="2">
        <button type="submit">Ir a final B</button>
    </form>
</div>
<?php
    include ("../../../templates/footer.php");
?>   

