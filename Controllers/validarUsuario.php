<?php
require_once('../Clases/Cconeccion.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conectarDB = Cconeccion::ConeccionDB();

/*
require_once('Clases/Cconeccion.php');
$conectarDB = Cconeccion::ConeccionDB();
session_start();
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? null;
    $clave = $_POST['clave'] ?? null;

    if (!empty($usuario) && !empty($clave)) {
        $loginQuery = "SELECT clave FROM usuario WHERE usuario = ? ";
        $stmt = mysqli_prepare($conectarDB, $loginQuery);
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $db_clave);
        mysqli_stmt_fetch($stmt);

        if (isset($db_clave)) {
            if (password_verify($clave, $db_clave)) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['logged_in'] = true;
                header('Location: ../Views/listado.php');
                exit;
            } else {
                $error_message = 'Usuario o contraseña incorrecta';
            }
        } else {
            $error_message = 'No existe el usuario';
        }
        mysqli_stmt_close($stmt);
    } else {
        $error_message = 'Debe llenar ambos campos';
    }
} else {
    header('Location: ../Views/login.php'); // Redirige si se accede directamente
    exit;
}

mysqli_close($conectarDB);