<?php
session_start();
$_SESSION = [];        // Elimina variables de sesión
session_destroy();     // Destruye la sesión
header('Location: /bienesraices/login.php');

exit;
