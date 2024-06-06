<!-- Modal Registrar-->
<div class="modal fade " id="modalModificar" tabindex="-1" aria-labelledby="modalModificarLabel" aria-hidden="true">
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
            <form class="row g-3">
              <div>
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="registrarEmail">
              </div>
              <div>
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="registrarPassword">
              </div>
              <div>
                <label for="nombreLabel" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="registrarNombre">
              </div>
              <div>
                <label for="apellidoLabel" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="registrarApellido">
              </div>
              <div class="mb-3">
                <button type="submit" name="botonmodificar" class="btn btn-primary form-control">Aceptar</button>
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