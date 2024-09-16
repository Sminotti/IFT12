<?php
require_once('../Clases/Cconeccion.php');
$conectarDB = Cconeccion::ConeccionDB();
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

if (!empty($usuario) && !empty($clave)) {

    $loginQuery = "SELECT usuario, clave FROM usuario WHERE usuario = ? ";
    $stmt = mysqli_prepare($conectarDB, $loginQuery);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_usuario, $db_clave);
    mysqli_stmt_fetch($stmt);

    if ($db_clave) {
        echo "   se encontro el usuario en la base de datos    " . $clave . "   con la clave:  " . $db_clave;
        $_SESSION['logged_in'] = true;
        header('Location: ../Views/listado.php');
        /*
        if (password_verify($clave, $db_clave)) {
            $_SESSION['usuario'] = $db_usuario;
            $_SESSION['logged_in'] = true;
            header('Location: index.php');
            exit;
        } else {
            $error_message = 'Usuario o contraseña incorrecta';
        }*/
    } else {
        $error_message = 'No existe el usuario';
    }
    mysqli_stmt_close($stmt);
} else {
    $error_message = 'Debe llenar ambos campos';
}

mysqli_close($conectarDB);
