<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("../Template/head.php"); ?>

<body class="content">

  <?php include_once("../Template/navBar.php"); ?>

  <div class="centrar">

    <div class="card " style="width: 300px; height: auto ">
      <div class="card-header">
        Modificar datos
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
            <div>
              <div class="input-group">
                <!-- LISTA DESPLEGABLE CARGAOS --------------------------------------->
                <select name="cargos" class="mt-2 form-select form-control btn btn-secondary">
                  <?php
                  $listarCargos = mysqli_query($conectarDB, $listarCargo);
                  while ($row = mysqli_fetch_array($listarCargos)) { ?>
                    <option value="<?php echo $row["idCargo"] ?>"><?php echo $row["cargo"] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <!-- LISTA DESPLEGABLE CARGAOS --------------------------------------->
            <button type="submit" name="modificar" class="mt-2 btn btn-primary form-control">Aceptar cambios</button>
            <?php
            // Modificar empleado
            if (isset($_POST['modificar'])) {
              $idCargo = $_POST['cargos'] ?? null;

              // Actualizar tabla persona
              $updatePersona = "UPDATE persona SET nombre=?, apellido=?, edad=?, dni=? WHERE idPersona=?";
              $stmtPersona = $conectarDB->prepare($updatePersona);
              $stmtPersona->bind_param("ssssi", $nombre, $apellido, $edad, $dni, $idPersona);


              // Actualizar tabla usuario
              $updateUsuario = "UPDATE usuario SET usuario=?, clave=? WHERE idPersona=?";
              $stmtUsuario = $conectarDB->prepare($updateUsuario);
              $stmtUsuario->bind_param("ssi", $usuario, $clave, $idPersona);


              // Actualizar idCargo de la tabla empleado
              $updateEmpleado = "UPDATE empleado SET idCargo=? WHERE idPersona=?";
              $stmtEmpleado = $conectarDB->prepare($updateEmpleado);
              $stmtEmpleado->bind_param("ii", $idCargo, $idPersona);


              if (!$stmtPersona->execute() || !$stmtUsuario->execute() || !$stmtEmpleado->execute()) {
                echo "Error al actualizar: " . $stmtPersona->error . $stmtUsuario->error . $stmtEmpleado->error;
              } else {
              
                header('location: listado.php');
              }
            }
            ?>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>