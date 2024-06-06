<?php
include_once("/xampp/htdocs/Mis_proyectos/Proyecto_clase/Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("/xampp/htdocs/Mis_proyectos/Proyecto_clase/Models/peticionesSql.php");
?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("Template/head.php"); ?>

<body >
      <div>
            <?php include_once("Template/navBar.php"); ?>
      </div>

      <div class="centrar" >
            <?php include_once("Views/loguin.php"); ?>
      </div>

      <div>
            <?php include_once("Template/footer.php"); ?>
      </div>

</body>

</html>