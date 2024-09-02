<?php

include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");

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
            // Listar empleado para editar
            $listarRegistro = mysqli_query($conectarDB, $listarEmpleado);
            while ($row = mysqli_fetch_array($listarRegistro)) { ?>
              <form method="post" class="d-grid bg-dark p-2 rounded">
                <!-- OBTENER LOS ID -------------------------------------------------------------------------------------------------------->
                <input type="text" name="idPersona" value="<?php echo $row["idPersona"]; ?>" style="display: none;">
                <input type="text" name="idUsuario" value="<?php echo $row["idUsuario"]; ?>" style="display: none;">
                <input type="text" name="idCargo" value="<?php echo $row["idCargo"]; ?>" style="display: none;">
                <input type="text" name="idEmpleado" value="<?php echo $row["idEmpleado"]; ?>" style="display: none;">
                <!-- OBTENER LOS ID -------------------------------------------------------------------------------------------------------->
                <input type="text" name="legajo" placeholder="Legajo" disabled value="<?php echo $row["legajo"]; ?>" class=" form-control">
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row["nombre"]; ?>" class=" mt-2 form-control">
                <input type="text" name="apellido" placeholder="Apellido" value="<?php echo $row["apellido"]; ?>" class="mt-2 form-control">
                <input type="text" name="edad" placeholder="edad" value="<?php echo $row["edad"]; ?>" class="mt-2 form-control">
                <input type="text" name="dni" placeholder="Dni" value="<?php echo $row["dni"]; ?>" class="mt-2 form-control">
                <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $row["usuario"]; ?>" class="mt-2 form-control">
                <input type="text" name="clave" placeholder="Clave" value="<?php echo $row["clave"]; ?>" class="mt-2 form-control">
                <input type="text" name="cargo" placeholder="Cargo" value="<?php echo $row["cargo"]; ?>" class="mt-2 form-control">
                <button type="submit" name="modificar" class="mt-2 btn btn-primary form-control">Aceptar cambios</button>
                <?php
                // Modificar empleado
                if (isset($_POST['modificar'])) {

                  if ($idEmpleado) {
                    // Actualizar tabla persona
                    $updatePersona = "UPDATE persona SET nombre=?, apellido=?, edad=?, dni=? WHERE idPersona=?";
                    $stmtPersona = $conectarDB->prepare($updatePersona);
                    $stmtPersona->bind_param("ssssi", $nombre, $apellido, $edad, $dni, $idPersona);
                    if (!$stmtPersona->execute()) {
                      echo "Error al actualizar tabla persona: " . $stmtPersona->error;
                    }

                    // Actualizar tabla usuario
                    $updateUsuario = "UPDATE usuario SET usuario=?, clave=? WHERE idPersona=?";
                    $stmtUsuario = $conectarDB->prepare($updateUsuario);
                    $stmtUsuario->bind_param("ssi", $usuario, $clave, $idPersona);
                    if (!$stmtUsuario->execute()) {
                      echo "Error al actualizar tabla usuario: " . $stmtUsuario->error;
                    }

                    // Actualizar idCargo de la tabla empleado
                    $updateEmpleado = "UPDATE empleado SET idCargo=? WHERE idPersona=?";
                    $stmtEmpleado = $conectarDB->prepare($updateEmpleado);
                    $stmtEmpleado->bind_param("ii", $idCargo, $idPersona);
                    if (!$stmtEmpleado->execute()) {
                      echo "Error al actualizar tabla empleado: " . $stmtEmpleado->error;
                    }

                    if ($stmtPersona->affected_rows > 0 && $stmtUsuario->affected_rows > 0 && $stmtEmpleado->affected_rows > 0) {
                      echo "<script>alert('Registro modificado con exito')</script>";
                      header('location: listado.php');
                    }
                  } else {
                    echo "<script>alert('Error al modificar')</script>";
                  }
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


