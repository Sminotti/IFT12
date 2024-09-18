<?php
require_once('../Clases/Cconeccion.php');
$conectarDB = Cconeccion::ConeccionDB();
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];


/* Obtener la contraseña cifrada almacenada en la base de datos
$loginQuery = "SELECT clave FROM usuario WHERE usuario = ? ";
$stmt = mysqli_prepare($conectarDB, $loginQuery);
mysqli_stmt_bind_param($stmt, "s", $usuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $db_clave);
mysqli_stmt_fetch($stmt);

 Verificar la contraseña utilizando password_verify
if (password_verify($clave, $db_clave)) {
    echo "ENTRO AL VERIFY";
//if (isset(($db_clave))) {
    // La contraseña es válida, permitir acceso
    $_SESSION['usuario'] = $usuario;
    $_SESSION['logged_in'] = true;
    header('Location: ../Views/listado.php');
    exit;
} else {
    // La contraseña es inválida, denegar acceso
    $error_message = 'Usuario o contraseña incorrecta';
}*/

if (!empty($usuario) && !empty($clave)) {

    $loginQuery = "SELECT clave FROM usuario WHERE usuario = ? ";
    $stmt = mysqli_prepare($conectarDB, $loginQuery);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_clave);
    mysqli_stmt_fetch($stmt);

    if (isset($db_clave)) {//  encuentra la clave del usuario que se esta loguendo   
        
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

mysqli_close($conectarDB);
