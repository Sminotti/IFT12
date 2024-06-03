<?php
include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("Template/head.php"); ?>

<body>
 
      <?php include_once("Template/navBar.php"); ?>

      <?php include_once("Views/loguin.php"); ?>
   
      <?php include_once("Template/footer.php"); ?>
  
</body>

</html>