<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idPersona = $_GET['idEmpleado'] ?? null;
?>

<?php
// Elimina persona
if (isset($idPersona)) {
      
    //$eliminarPersona = mysqli_query($conectarDB, $eliminarEmpleado);
    $eliminarEmpleado = "UPDATE empleado SET habilitado=0, eliminado=1 WHERE idEmpleado=?";
    $stmtEliminar = $conectarDB->prepare($eliminarEmpleado);
    $stmtEliminar->bind_param("i", $idEmpleado);
    
    if ($stmtEliminar->execute()) {
        echo "<script>alert('Empleado eliminado con éxito');</script>";
        header('location: listado.php');
    } else {
        echo "<script>alert('Error al eliminar empleado');</script>";
    }
    
    $stmtEliminar->close();
    header('location: listado.php');
}
?>
