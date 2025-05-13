<?php
session_start();
session_unset();
session_destroy();

// Borrar la cookie de sesión
setcookie(session_name(), '', time() - 3600, '/');

header('Location: index.php');
exit;

