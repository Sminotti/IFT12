<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <button class="navbar-toggler me-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header bg-secondary">
        
        <h5 class="offcanvas-title " id="offcanvasNavbarLabel">Bienvenido: <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : "Ingrese Usuario" ?></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body bg-dark">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            <!--<a class="nav-link active" aria-current="page" href="../IFT12/index.php">Home</a>--><!-- para usar en el trabajo -->
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../Views/listado.php">Listar Empleados </a>
          </li>
        </ul>
      </div>
    </div>
    <a class="navbar-brand text-white " href="../index.php">Proyecto La canchita de los pibes</a>
    <!--<a class="navbar-brand text-white " href="../IFT12/index.php">Proyecto La canchita de los pibes</a>--><!-- para usar en el trabajo -->
    <div class="ms-auto">
    <?php if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) { ?>
        <!--Boton modal Loguin-->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLoguin" >
          Ingresar
        </button>
        <!--Boton modal Registro-->
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalRegistrar">
          Registrate
        </button>
    <?php } else { ?>
      <!--Boton cerrar session-->
        <a class="btn btn-danger" href="<?php echo dirname($_SERVER['PHP_SELF']) . '/Controllers/cerrarSesision.php'; ?>"><i class="bi bi-box-arrow-right"></i></a>
    <?php } ?>
    </div>
  </div>
</nav>

<?php
include_once("Components/modalLoguin.php");
?>
<?php
include_once("Components/modalRegistrar.php");
?>