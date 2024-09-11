
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header bg-secondary">
        <h5 class="offcanvas-title " id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body bg-dark">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="Views/listado.php">Listar Empleados </a>
          </li>
        </ul>
      </div>
    </div>
    <a class="navbar-brand text-white " href="../index.php">Proyecto Ifts12</a>
    <div class="ms-auto">
      <!--Boton modal Loguin-->
      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalLoguin">
        Ingresar
      </button>
      <!--Boton modal Registro-->
      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalRegistrar">
        Registrate
      </button>
    </div>


  </div>
</nav>

<?php
include_once("Components/modalLoguin.php");
?>
<?php
include_once("Components/modalRegistrar.php");
?>