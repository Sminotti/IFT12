<?php
// DECLARACIONES DE VARIABLES

$nombre = $_POST['nombre'] ?? null;
$apellido = $_POST['apellido'] ?? null;
$edad = $_POST['edad'] ?? null;
$dni = $_POST['dni'] ?? null;
$usuario = $_POST['usuario'] ?? null;
$legajo = $_POST['legajo'] ?? null;
$cargo = $_POST['cargo'] ?? null;
//$password = password_hash($_POST['password'], PASSWORD_BCRYPT,['cost' => 10])?? null;// buscar otra forma no deprecated...
$clave = $_POST['clave'] ?? null;
$idUsuario = $_POST['idUsuario'] ?? null; // para crear empleado
$idCargo = $_POST['idCargo'] ?? null; // para crear empleado
$idEmpleado = $_GET['idEmpleado'] ?? null;
$idPersona = $_POST['idPersona'] ?? null;

//-------------------------------------SENTENCIAS----------------------------------------------------------------------------------------------------------------//
// LOGIN //
$login = "SELECT usuario,clave FROM usuario WHERE usuario=$usuario AND clave=$clave AND habilitado=1 AND eliminado = 0";
// REGISTRO DE USUARIO //
$crearPersona = "INSERT INTO persona (nombre,apellido,edad,dni,legajo) VALUES ('$nombre','$apellido','$edad','$dni','$legajo') ";
// CREAR EMPLEADO
//$crearEmpleado = "INSERT INTO empleado (idCargo,idPersona,idUsuario) VALUES ('$idCargo','$idPersona','$idUsuario')";
// LISTAR REGISTROS PERSONAS//
$listarPersona = "SELECT idPersona,apellido,nombre,edad,dni FROM persona WHERE habilitado=1 AND eliminado = 0 ORDER BY idPersona DESC ";
// EMPLEADOS
$listarEmpleados = "SELECT persona.idPersona, empleado.idEmpleado, persona.legajo, persona.nombre, persona.apellido, persona.edad, persona.dni, cargo.cargo, usuario.usuario
FROM empleado
INNER JOIN persona ON empleado.idPersona = persona.idPersona 
INNER JOIN cargo ON empleado.idCargo  = cargo.idCargo 
INNER JOIN usuario ON empleado.idUsuario = usuario.idUsuario
WHERE empleado.habilitado = 1 AND empleado.eliminado = 0 ORDER BY empleado.idEmpleado ASC ";
// LISTAR CARGO
$listarCargo = "SELECT idCargo,cargo FROM cargo WHERE habilitado=1 AND eliminado=0";
// EDITAR EMPLEADOS---------------------------------------------------------------------------------------------------------//
$listarEmpleado = "SELECT empleado.idEmpleado, empleado.idPersona,empleado.idCargo,empleado.idUsuario, persona.legajo, persona.nombre, persona.apellido, persona.edad, persona.dni, cargo.cargo, usuario.usuario, usuario.clave
FROM empleado
INNER JOIN persona ON empleado.idPersona = persona.idPersona 
INNER JOIN cargo ON empleado.idCargo  = cargo.idCargo 
INNER JOIN usuario ON empleado.idUsuario = usuario.idUsuario
WHERE idEmpleado='$idEmpleado' AND empleado.habilitado=1 AND empleado.eliminado=0";

// EDITAR EMPLEADOS---------------------------------------------------------------------------------------------------------//

// ELIMINAR REGISTRO EMPLEADOS (sin prepared)//
//$eliminar = "UPDATE empleado SET habilitado=0 ,eliminado=1 WHERE idEmpleado='$idEmpleado'";
// ELIMINAR REGISTRO EMPLEADOS//
