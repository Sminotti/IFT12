<?php
include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");


//variable de sesion
session_start();
if (!isset ($_SESSION['idEmpleado'])) {
echo "no esta logueado";
//exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("Template/head.php"); ?>

<body>
      <div>
            <?php include_once("Template/navBar.php"); ?>
      </div>

      <H1>bienvenido@ <?php echo $_SESSION['usuario_logueado'] ?></H1>

      <div>
            <?php include_once("Template/footer.php"); ?>
      </div>

</body>

</html>