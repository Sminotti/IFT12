<?php

include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
$idObtenido = 0;
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
          </div>
          <div class="card-body">
            <form method="post" class="row g-3">
              <div>
                <input type="text" name="idPersona" id="idPersona" style="display: none;">
                <label for="registrarEmail" class="form-label">Email</label>
                <input type="email" name="usuario" id="registrarEmail">
                <label for="registrarPassword" class="form-label">Password</label>
                <input type="password" name="clave" id="registrarClave">
              </div>

              <div>
                <label for="registrarNombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="registrarNombre">
                <label for="registrarApellido" class="form-label">Apellido</label>
                <input type="text" name="apellido" id="registrarApellido">
              </div>
          </div>
          <div>
            <label for="registrarEdad" class="form-label">Edad</label>
            <input type="text" name="edad" id="registrarEdad">
            <label for="registrarDni">Dni</label>
            <input type="text" name="dni" id="registrarDni">
          </div>
          <div>
            <label for="registrarCargo" class="form-label">Cargo</label>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Selecione el cargo a ocupar
              </button>
              <ul class="dropdown-menu">
                <?php
                // Listar personas
                $listarRegistros = mysqli_query($conectarDB, $listarEmpleados);
                while ($row = mysqli_fetch_array($listarRegistros)) { ?>
                  <li><a class="dropdown-item" ref="#">Action</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div>
            <label for="registrarLegajo" class="form-label">Legajo</label>
            <input type="text" name="legajo" class="form-control" id="registrarDni">
          </div>
          <div class="mb-3">
            <button type="submit" name="Registrate" class="btn btn-primary form-control">Registrarse</button>
          </div>
          <?php

          if (isset($_POST['Registrate'])) {

            $ingresarPersona = mysqli_query($conectarDB, $crearPersona);
            $idPersonaObtenido = mysqli_insert_id($conectarDB);

            if (isset($idPersonaObtenido)) {

              $crearUsuario = "INSERT INTO usuario (idPersona, usuario, clave) VALUES ('$idObtenido', '$usuario', '$clave')";
              $ingresarUsuario = mysqli_query($conectarDB, $crearUsuario);
              $idUsuarioObtenido = mysqli_insert_id($conectarDB);
              $crearEmpleado = mysqli_query($conectarDB, $crearEmpleado);
              echo "Usuario creado exitosamente : " . $idPersonaObtenido;
            } else {
              echo "<script>alert('Error al crear usuario.');</script>";
            }
          }
          ?>
          </form>

        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>