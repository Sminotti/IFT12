<?php
// DECLARACIONES DE VARIABLES

$nombre = $_POST['nombre'] ?? null;
$apellido = $_POST['apellido'] ?? null;
$edad = $_POST['edad'] ?? null;
$dni = $_POST['dni'] ?? null;
$idPersona = $_GET['idPersona'] ?? null; // para el eliminar y modificar
$usuario = $_POST['usuario'] ?? null;
$legajo = $_POST['legajo'] ?? null;
$cargo = $_POST['cargo'] ?? null;
//$password = password_hash($_POST['password'], PASSWORD_BCRYPT,['cost' => 10])?? null;// buscar otra forma no deprecated...
$clave = $_POST['clave'] ?? null;
$idUsuario = $_POST['idUsuario']; // para crear empleado
$idCargo = $_POST['idCargo']; // para crear empleado

//-------------------------------------SENTENCIAS----------------------------------------------------------------------------------------------------------------//
// LOGIN //
$login = "SELECT usuario,clave FROM usuario WHERE usuario=$usuario AND clave=$clave AND habilitado=1 AND eliminado = 0";
// REGISTRO DE USUARIO //
$crearPersona = "INSERT INTO persona (nombre,apellido,edad,dni,legajo) VALUES ('$nombre','$apellido','$edad','$dni','$legajo') ";
// LISTAR REGISTROS PERSONAS//
$listar = "SELECT idPersona,apellido,nombre,edad,dni FROM persona WHERE habilitado=1 AND eliminado = 0 ORDER BY idPersona DESC ";
// EDITAR REGISTRO PERSONAS//
$listarRegistro = "SELECT idPersona,apellido,nombre,edad,dni FROM persona WHERE idPersona='$idPersona'AND habilitado=1 AND eliminado = 0";
$editar = "UPDATE persona,usuario SET nombre='$nombre',apellido='$apellido',edad='$edad',dni='$dni' ,usuario='$usuario',clave='$clave' WHERE idPersona='$idPersona' ";
// ELIMINAR REGISTRO PERSONAS//
$eliminar = "UPDATE persona SET habilitado=0 ,eliminado=1 WHERE idPersona='$idPersona'";
// LISTAR CARGO
$listarCargo = "SELECT idCargo,cargo FROM cargo WHERE habilitado=1, eliminado=0";
// CREAR EMPLEADO
$crearEmpleado = "INSERT INTO empleado (idCargo,idPersona,idUsuario) VALUES ('$idCargo','$idPersona','$idUsuario')";
