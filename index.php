<?php
include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("Template/head.php"); ?>

<body>
      <div>
            <?php include_once("Template/navBar.php"); ?>
      </div>

    

      <div>
            <?php include_once("Template/footer.php"); ?>
      </div>

</body>

</html>