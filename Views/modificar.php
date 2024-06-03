<!--MODAL EDITAR-->

<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");

$idPersona= $_GET['idPersona']?? null;
?>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="modificar.php?idPersona=<?php echo $idPersona ?>" method="post"  class="d-grid bg-dark p-2 rounded">
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"  class=" form-control">
        <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>" class="mt-2 form-control">
        <input type="text" name="edad" value="<?php echo $row['edad']; ?>" class="mt-2 form-control">
        <input type="text" name="dni" value="<?php echo $row['dni']; ?>" class="mt-2 form-control">
        <button type="submit" name="modificar" class="mt-2 btn btn-primary form-control">Aceptar cambios</button>
        <?php
        // Modificar persona
        if (isset($_POST['modificar'])) {
          $ingresarRegistro = mysqli_query($conectarDB, $editar);
          header('location: index.php');
          }
        ?>
      </form>
      </div>
    </div>
  </div>
</div>