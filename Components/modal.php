
<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idPersona = $_GET['idPersona'] ?? null;
?>

<?php echo "persona ". $idPersona; ?>


<!-- Modal -->
<div class="modal fade" id="modalEditar?idPersona=<?php echo $row["idPersona"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo "persona"." ". $idPersona ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>