<?php

include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
?>


<div class="card " style="width: 300px; height: auto ">
  <div class="card-header">
    Ingresa o registrate
  </div>
  <div class="card-body">
    <form class="row g-3">
      <div>
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4">
      </div>
      <div>
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary form-control">Ingrese</button>
      </div>
    </form>
  <!--Boton modal Registro-->
    <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#modalRegistrar">
      Registrate
    </button>
  </div>
</div>
<?php include_once("Components/ModalRegistrar.php"); ?>



