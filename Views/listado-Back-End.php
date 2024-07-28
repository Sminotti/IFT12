<?php
header('Access-Control-Allow-Origin:*');


include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idPersona = $_GET['idPersona'] ?? null;


  // Listar personas
  $listarRegistros = mysqli_query($conectarDB, $listar);
  $registros =mysqli_fetch_array($listarRegistros);
  $mostrarRegistros = json_encode($registros);

  echo json_encode ($mostrarRegistros);
?>  