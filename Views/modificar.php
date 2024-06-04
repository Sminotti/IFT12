<!--MODAL EDITAR-->

<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idPersona = $_GET['idPersona'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once("../Template/head.php"); ?>

<body>
  <?php include_once("../Template/navBar.php"); ?>
  <?php
  // Lista persona para editar
  $listarRegistro = mysqli_query($conectarDB, $listarRegistro);
  while ($row = mysqli_fetch_array($listarRegistro)) { ?>
    <div class="card border-success mb-3" style="max-width: 18rem;">
      <div class="card-header bg-transparent border-success">Actualizar registro <?php echo $idPersona ?></div>
      <div class="card-body text-success">
        <form method="post" class="d-grid bg-dark p-2 rounded">
          <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>" class=" form-control">
          <input type="text" name="apellido" value="<?php echo $row["apellido"]; ?>" class="mt-2 form-control">
          <input type="text" name="edad" value="<?php echo $row["edad"]; ?>" class="mt-2 form-control">
          <input type="text" name="dni" value="<?php echo $row["dni"]; ?>" class="mt-2 form-control">
          <button type="submit" name="modificar" class="mt-2 btn btn-primary form-control">Aceptar cambios</button>
          <?php
          // Modificar persona
          if (isset($_POST['modificar'])) {
            $ingresarRegistro = mysqli_query($conectarDB, $editar);

            header('location: listado.php');
          }
          ?>
        </form>
      <?php } ?>
      </div>
      <div class="card-footer bg-transparent border-success">Footer</div>
    </div>


    <?php include_once("../Template/footer.php"); ?>
</body>

</html>