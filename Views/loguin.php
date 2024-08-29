<?php
include_once("Clases/Cconeccion.php");
$conectarBD = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");

$usuario = $_POST['usuario']?? NULL;
$password = $_POST['password'] ?? NULL;
?>


<div class="card " style="width: 300px; height: auto ">


  <div class="card-header">
    Ingresa o registrate
  </div>
  <div class="card-body">
      <!-- Boton login con validaciones-->
<?php
  if (isset($_POST['login'])) {
    if (!empty($_POST['usuario'])&&!empty($_POST['usuario']) ) {
      $ingresarLogin = mysqli_query($conectarDB, $login);
      if($ingresarLogin){
        header('location: Views/listado.php');
      }    
    }  else  {
      echo " <div class='alert alert-danger' role='alert'> Ingrese usuario y contraseña</div>";
    }    
  }
?>
 <!-- Boton login con validaciones-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row g-3">
      <div>
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4" name="usuario">
      </div>
      <div>
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4" name="clave">
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
  include_once("Components/modalRegistrar.php"); 
?>