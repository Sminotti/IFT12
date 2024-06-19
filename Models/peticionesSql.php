<?php
$nombre = $_POST['nombre'] ?? null;
$apellido = $_POST['apellido'] ?? null;
$edad = $_POST['edad'] ?? null;
$dni = $_POST['dni'] ?? null;
$idPersona = $_GET['idPersona'] ?? null;
$usuario = $_POST['usuario'] ?? null;
$password = $_POST['password'] ?? null;

// REGISTRO DE USUARIO //
$registroUsuario = "INSERT INTO usuario (usuario,password) value ('$usuario','$password') ";
// LOGIN //
$login = "SELECT * FROM usuario WHERE usuario=$usuario AND password=$password AND habilitado=1 AND eliminado = 0";
// INSERTAR REGISTRO PERSONA//
$insertarPersona = "INSERT INTO persona (nombre,apellido,edad,dni) Values ('$nombre','$apellido','$edad','$dni')";
// LISTAR REGISTROS PERSONAS//
$listar = "SELECT * FROM persona WHERE habilitado=1 AND eliminado = 0";
// EDITAR REGISTRO PERSONAS//
$listarRegistro = "SELECT * FROM persona WHERE idPersona='$idPersona'";
$editar = "UPDATE persona SET nombre='$nombre',apellido='$apellido',edad='$edad',dni='$dni' WHERE idPersona='$idPersona' ";
//ELIMINAR REGISTRO PERSONAS//
$eliminar = "UPDATE persona SET habilitado=0 ,eliminado=1 WHERE idPersona='$idPersona'";
