<?php
require_once('../Clases/Cconeccion.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conectarDB = Cconeccion::ConeccionDB();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? null;
    $clave = $_POST['clave'] ?? null;
    if (!empty($usuario) && !empty($clave)) {
        $loginQuery = "SELECT clave FROM usuario WHERE usuario = ? AND habilitado = 1 AND eliminado = 0";
        $stmt = mysqli_prepare($conectarDB, $loginQuery);
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $db_clave);
        mysqli_stmt_fetch($stmt);
        if (isset($db_clave)) {
            error_log("Contraseña ingresada: $clave");
            error_log("Contraseña almacenada: $db_clave");
            // Elimina cualquier salida antes de header()
            if (password_verify($clave, $db_clave)) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['logged_in'] = true;
                header('Location: ../Views/listado.php');
                exit;
            } else {
                error_log("Contraseña incorrecta para el usuario: $usuario");
                $error_message = 'Usuario o contraseña incorrecta';
            }
        } else {
            error_log("Usuario no encontrado");
            $error_message = 'No existe el usuario';
        }
        mysqli_stmt_close($stmt);
    } else {
        error_log("Campos vacíos");
        $error_message = 'Debe llenar ambos campos';
    }
} else {
    header('Location: ../index'); // Redirige si se accede directamente
    exit;
}
mysqli_close($conectarDB);
