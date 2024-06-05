<?php
$nombre = $_POST['nombre']?? null;
$apellido = $_POST['apellido']?? null;
$edad = $_POST['edad']?? null;
$dni = $_POST['dni']?? null;
$idPersona= $_GET['idPersona']?? null;

// INSERTAR REGISTRO //
$insertar = "INSERT INTO persona (nombre,apellido,edad,dni) Values ('$nombre','$apellido','$edad','$dni')";
// LISTAR REGISTROS //
$listar = "SELECT * FROM persona";
// EDITAR REGISTRO//
$listarRegistro="SELECT * FROM persona WHERE idPersona='$idPersona'";
$editar = "UPDATE persona SET nombre='$nombre',apellido='$apellido',edad='$edad',dni='$dni' WHERE idPersona='$idPersona' ";
//ELIMINAR REGISTRO//
$eliminar = "DELETE * FROM persona WHERE idPersona='$idPersona'";



 
