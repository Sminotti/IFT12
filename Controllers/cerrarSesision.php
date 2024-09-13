<?php
session_start();
unset($_SESSION['logged_in']);
session_destroy();
// redirigir a la página de inicio de sesión
header('Location: ../Views/listado.php');
exit;
?>