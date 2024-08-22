<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idPersona = $_GET['idEmpleado'] ?? null;
?>

<?php
// Elimina persona
if (isset($idPersona)) {
      
    $eliminarPersona = mysqli_query($conectarDB, $eliminar);

    header('location: listado.php');
}
?>
