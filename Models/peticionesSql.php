<?php //PETICIONES SQL
 
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $edad = $_POST['edad'] ?? null;
    $dni = $_POST['dni'] ?? null;
    $idPersona = $_GET['idPersona'] ?? null;
    $usuario = $_POST['usuario'] ?? null;
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT,['cost' => 10])?? null;// buscar otra forma no deprecated...
    $clave= $_POST['clave'] ?? null;
    // LOGIN //
    $login = "SELECT usuario,clave FROM usuario WHERE usuario=$usuario AND clave=$clave AND habilitado=1 AND eliminado = 0";
    // REGISTRO DE USUARIO //
    $crearPersona = "INSERT INTO persona (nombre,apellido,edad,dni) VALUES ('$nombre','$apellido','$edad','$dni') ";
    // CREAR USUARIO Y CONTRASEÑA
   // $crearUsuario = "INSERT INTO usuario (usuario,clave,idPersona) VALUES ('$usuario','$clave','$idObtenido')";
    // LISTAR REGISTROS PERSONAS//
    $listar = "SELECT idPersona,apellido,nombre,edad,dni FROM persona WHERE habilitado=1 AND eliminado = 0 ORDER BY idPersona DESC ";
    // EDITAR REGISTRO PERSONAS//
    $listarRegistro = "SELECT idPersona,apellido,nombre,edad,dni FROM persona WHERE idPersona='$idPersona'AND habilitado=1 AND eliminado = 0";
    $editar = "UPDATE persona,usuario SET nombre='$nombre',apellido='$apellido',edad='$edad',dni='$dni' ,usuario='$usuario',clave='$clave' WHERE idPersona='$idPersona' ";
    //ELIMINAR REGISTRO PERSONAS//
    $eliminar = "UPDATE persona SET habilitado=0 ,eliminado=1 WHERE idPersona='$idPersona'";
?>
