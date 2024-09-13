<?php
include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
?>

<!-- Modal Registrar-->
<div class="modal fade " id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <div class="card " style="width: 100%; height: auto ">
          <div class="card-header">
            <h5 class="card-title text-center">Ingrese datos del nuevo empleado</h5>
          </div>
          <div class="card-body">
            <form method="post">
              <div class="d-grid gap-3">

                <div class="p-2 bg-light border">
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="email" name="usuario" class="form-control" placeholder="Nombre de usuario" id="registrarEmail" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" name="clave" class="form-control" placeholder="Inegrese password" id="registrarClave" aria-label="Inegrese password" aria-describedby="basic-addon1">
                  </div>
                </div>
                <div class="p-2 bg-light border">
                  <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                    <input type="text" name="nombre" class="form-control" id="registrarNombre" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1">Apellido</span>
                    <input type="text" name="apellido" class="form-control" id="registrarApellido" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1">Edad</span>
                    <input type="text" name="edad" class="form-control" id="registrarEdad" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                    <span class="input-group-text" id="basic-addon1">Dni</span>
                    <input type="text" name="dni" class="form-control" id="registrarDni" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                  </div>
                </div>

                <div class="p-2 bg-light border">
                  <div class="input-group">
                    <!-- LISTA DESPLEGABLE CARGAOS --------------------------------------->
                    <span class="input-group-text" id="basic-addon1">Legajo</span>
                    <input type="text" name="legajo" id="registrarLegajo">
                    <span class="input-group-text" id="basic-addon1">Cargo a desempeñar</span>
                    <select name="cargos" class="form-select btn btn-secondary" style="width: auto;">
                      <?php
                      $listarCargos = mysqli_query($conectarDB, $listarCargo);
                      while ($row = mysqli_fetch_array($listarCargos)) { ?>
                        <option value="<?php echo $row["idCargo"] ?>"><?php echo $row["cargo"] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- LISTA DESPLEGABLE CARGAOS --------------------------------------->

                <div class="p-2 bg-light border">
                  <div class="input-group">
                    <button type="submit" name="Registrate" class="btn btn-primary form-control">Registrar empleado</button>
                  </div>
                </div>

              </div>

              <?php

              if (isset($_POST['Registrate'])) {
                $idCargo = $_POST['cargos'] ?? null;
                $ingresarPersona = mysqli_query($conectarDB, $crearPersona);
                $idPersonaObtenido = mysqli_insert_id($conectarDB);

                if (isset($idPersonaObtenido)) {

                  $clave = $_POST['clave'];
                  $hashed_password = password_hash($clave, PASSWORD_DEFAULT);
                  $stmt = $conectarDB->prepare("INSERT INTO usuario (idPersona, usuario, clave) VALUES (?, ?, ?)");
                  $stmt->bind_param("sss", $idPersonaObtenido, $usuario, $hashed_password);
                  $stmt->execute();
                  //$crearUsuario = "INSERT INTO usuario (idPersona, usuario, clave) VALUES ('$idPersonaObtenido', '$usuario', '$hashed_password')";
                  //$crearUsuario = "INSERT INTO usuario (idPersona, usuario, clave) VALUES ('$idPersonaObtenido', '$usuario', '$clave')";
                  //$ingresarUsuario = mysqli_query($conectarDB, $crearUsuario);
                  $idUsuarioObtenido = mysqli_insert_id($conectarDB);

                  if (isset($idCargo)) {
                    $crearEmpleado = "INSERT INTO empleado (idCargo,idPersona,idUsuario) VALUES ('$idCargo','$idPersonaObtenido','$idUsuarioObtenido')";
                    $IngresarEmpleado = mysqli_query($conectarDB, $crearEmpleado);
                  }
                  echo "<script>alert('Usuario'creado exitosamente);</script>";
                } else {
                  echo "<script>alert('Error al crear usuario.');</script>";
                }
              }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>