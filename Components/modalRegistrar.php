<?php

include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
?>



<!-- Modal Registrar-->
<div class="modal fade " id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <div class="card " style="width: 300px; height: auto ">
          <div class="card-header">
            Ingresa tus datos y registrate
          </div>
          <div class="card-body">
            <form  method="post"  class="row g-3">
              <div>
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="usuario" class="form-control" id="registrarEmail">
              </div>
              <div>
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="registrarPassword">
              </div>
              <div>
                <label for="nombreLabel" class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="registrarNombre">
              </div>
              <div>
                <label for="apellidoLabel" class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="registrarApellido">
              </div>
              <div>
                <label for="edadLabel" class="form-label">Edad</label>
                <input type="text" name="edad" class="form-control" id="registrarEdad">
              </div>
              <div>
                <label for="dniLabel" class="form-label">Dni</label>
                <input type="text" name="dni" class="form-control" id="registrarDni">
              </div>
              <div class="mb-3">
                <button type="submit" name="Registrate" class="btn btn-primary form-control">Registrarse</button>
              </div>
              <?php
               
                if (isset($_POST['Registrate'])) {
                  $ingresarRegistro = mysqli_query($conectarDB, $insertarPersona);
                  $ingresarRegistro = mysqli_query($conectarDB, $registroUsuario);
                  header('location: Views/listado.php');
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