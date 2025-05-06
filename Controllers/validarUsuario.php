<?php
require_once('../Clases/Cconeccion.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conectarDB = Cconeccion::ConeccionDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? null);
    $clave = trim($_POST['clave'] ?? null);

    if (!empty($usuario) && !empty($clave)) {
        $loginQuery = "SELECT clave FROM usuario WHERE usuario = ? AND habilitado = 1 AND eliminado = 0";
        $stmt = mysqli_prepare($conectarDB, $loginQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $usuario);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $db_clave);
            mysqli_stmt_fetch($stmt);

            if (!empty($db_clave) && password_verify($clave, $db_clave)) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['logged_in'] = true;
                mysqli_stmt_close($stmt);
                mysqli_close($conectarDB);
                header('Location: ../Views/listado.php');
                exit;
            } else {
                $_SESSION['error_message'] = 'Usuario o contraseña incorrecta';
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error_message'] = 'Error interno del servidor';
        }
    } else {
        $_SESSION['error_message'] = 'Debe llenar ambos campos';
    }
    mysqli_close($conectarDB);
    header('Location: ../index.php'); // Redirige al modal
    exit;
}
