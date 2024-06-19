<?php
include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
include_once("Controllers/CLoguin.php");
?>


<div class="card " style="width: 300px; height: auto ">
  <div class="card-header">
    Ingresa o registrate
  </div>
  <div class="card-body">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row g-3">
      <div>
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="usuario">
      </div>
      <div>
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4" name="password">
      </div>
      <div class="mb-3">
        <button type="submit" name="login" class="btn btn-primary form-control">Ingrese</button>
      </div>
    </form>
    <!--Boton modal Registro-->
    <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#modalRegistrar">
      Registrese
    </button>
  </div>
</div>
<?php
if (isset($_POST['login'])) {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  $ingresar = verificarLogin($usuario, $password);
 echo $ingresar; 
}
?>
<?php include_once("Components/modalRegistrar.php"); ?>