<?php
include ("../controllers/StoryController.php");
session_start();

// Iniciar sesión
if (isset($_SESSION['usuario_id'], $_SESSION['nombre_usuario'])) {
    $usuarioId = $_SESSION['usuario_id'];
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $mensajeBienvenida = "¡Eso ha estado genial, $nombreUsuario!";
} else {
    echo "Las claves 'usuario_id' o 'nombre_usuario' no están definidas en la sesión.";
}
?>

<?php
    include ("../../templates/head.php");
?>

    <?php if (isset($mensajeBienvenida)) { ?>
        <h1><?php echo $mensajeBienvenida; ?></h1>
    <?php } else { ?>
        <h1>¡Eso ha estado genial!</h1>
    <?php } ?>

<?php
    // Obtener la primera historia de la tabla historias
    $connection = createConnection("interactive_history");

    // Obtener los datos de personalización del usuario desde la tabla personalizacion_historia
    $userId = $_SESSION['usuario_id'];
    $personalizationSql = "SELECT nombre_protagonista, nombre_mejor_amigo, nombre_enemigo, comida_favorita, color_favorito, numero_favorito
     FROM personalizacion_historia WHERE usuario_id = ?";
    $stmt = mysqli_prepare($connection, $personalizationSql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $protagonistName = $row['nombre_protagonista'];
        $bestFriendName = $row['nombre_mejor_amigo'];
        $enemyName = $row['nombre_enemigo'];
        $favoriteFood = $row['comida_favorita'];
        $favoriteColor = $row['color_favorito'];
        $favoriteNumber = $row['numero_favorito'];
    } else {
        // Manejar el caso en que no se encuentren datos de personalización
    }
    mysqli_stmt_close($stmt);
    
    // Resto de tu código...
?>

    <h3>¡Gracias por personalizar tu historia!</h3>
    <p>Ahora te mostraremos brevemente las elecciones que has tomado:</p>
    
    <p>El nombre del personaje principal será: <?php echo $protagonistName; ?></p>
    <p>El nombre de su mejor amig@ será: <?php echo $bestFriendName; ?></p>
    <p>El nombre de su enemig@ será: <?php echo $enemyName; ?></p>
    <p>Su comida favoríta será: <?php echo $favoriteFood; ?></p>
    <p>Su color favorito será el: <?php echo $favoriteColor; ?></p>
    <p>Su número favorito será el: <?php echo $favoriteNumber; ?></p>
    <p>¿Te gustan tus elecciones? Si es así haz click en "Comenzar la historia"</p>
    <p>¿Prefieres cambiar algun dato? Haz click en "Editar"</p>
     
    <h5><a href="./viewEditForm.php">Editar</a></h5>
    <h5><a href="./viewHistory.php">¡Comencemos la historia!</a></h5>

<?php
    include ("../../templates/footer.php");
?>
