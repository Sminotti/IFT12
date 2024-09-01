<?php

include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
$idObtenido = 0;
?>

<!-- Modal Modificar-->
<div class="modal fade " id="modalModificar?idPersona=<?php echo $row["idPersona"]; ?>" tabindex="-1" aria-labelledby="modalModificarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <div class="card " style="width: 300px; height: auto ">
          <div class="card-header">
            Modificar datos<?php echo $idPersona ?>
          </div>
          <div class="card-body">
            <?php
            // Lista empleado para editar
            $listarRegistro = mysqli_query($conectarDB, $listarEmpleado);
            while ($row = mysqli_fetch_array($listarRegistro)) { ?>
              <form method="post" class="d-grid bg-dark p-2 rounded">
                <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>" class=" form-control">
                <input type="text" name="apellido" value="<?php echo $row["apellido"]; ?>" class="mt-2 form-control">
                <input type="text" name="edad" value="<?php echo $row["edad"]; ?>" class="mt-2 form-control">
                <input type="text" name="dni" value="<?php echo $row["dni"]; ?>" class="mt-2 form-control">
                <button type="submit" name="modificar" class="mt-2 btn btn-primary form-control">Aceptar cambios</button>
                <?php
                // Modificar empleado
                if (isset($_POST['modificar'])) {
                  $modificarRegistro = mysqli_query($conectarDB, $editar);
                  header('location: listado.php');
                }
                ?>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
