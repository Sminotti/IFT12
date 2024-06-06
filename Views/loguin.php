<?php

include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
?>


<div class="card " style="width: 300px; height: 350px ">
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

    <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#modalRegistrar">
      Registrate
    </button>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card " style="width: 300px; height: 350px ">
          <div class="card-header">
            Ingresa tus datos y registrate
          </div>
          <div class="card-body">
            <form class="row g-3">
              <div>
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="registrarEmail">
              </div>
              <div>
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="registrarPassword">
              </div>
              <div class="mb-3">
                <button type="submit" name="Registrate" class="btn btn-primary form-control">Ingrese</button>
              </div>
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