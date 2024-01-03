
<?php

session_start();

if (isset($_SESSION['usuario_id'])) {
    $userSession = $_SESSION['usuario_id'];
    $user = htmlspecialchars($userSession);
} else {
    echo "La clave 'usuario_id' no está definida en la sesión.";
}

?>