<?php
// problema de CORS
header('Access-Control-Allow-Origin:*');


include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idPersona = $_GET['idPersona'] ?? null;


// Listar personas
$listarRegistros = mysqli_query($conectarDB, $listar);
//$registros =mysqli_fetch_array($listarRegistros);
// $mostrarRegistros = json_encode($registros);
$registros = mysqli_fetch_all($listarRegistros, MYSQLI_ASSOC);
//$registros =mysqli_fetch_assoc($listarRegistros);
echo json_encode($registros);

if (isset($idPersona)) {
  // Listar persona
  $listarPersona = mysqli_query($conectarDB, $listarRegistro);
  $persona= mysqli_fetch_all($listarPersona, MYSQLI_ASSOC);
  echo json_encode($listarPersona);
  // editar persona
  $editarPersona = mysqli_query($conectarDB, $editar);
  // eliminar persona
  $eliminarPersona = mysqli_query($conectarDB, $eliminar);
}

