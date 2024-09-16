<?php
require_once('../Clases/Cconeccion.php');
$conectarDB = Cconeccion::ConeccionDB();
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

if (!empty($usuario) && !empty($clave)) {

    $loginQuery = "SELECT clave FROM usuario WHERE usuario = ? ";
    $stmt = mysqli_prepare($conectarDB, $loginQuery);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $db_clave);
    mysqli_stmt_fetch($stmt);

    if (isset( $db_clave)) {
      echo "hasta aca entra" . $clave ." ". $db_clave;
      if (password_verify($clave, $db_clave)) {    
        echo "entro al password_verify";
            $_SESSION['usuario'] = $usuario;
            $_SESSION['logged_in'] = true;
              header('Location: ../IFTS//Views/listado.php');
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
