<?php
include_once("Clases/Cconeccion.php");
$conectarBD = Cconeccion::ConeccionDB();
//include_once("Models/peticionesSql.php");
?>


<div class="card " style="width: 300px; height: auto ">


  <div class="card-header">
    Ingresa o registrate
  </div>
  <div class="card-body">

    <!-- Boton login con validaciones-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row g-3">
      <div>
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="usuario">
      </div>
      <div>
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="clave">
      </div>
      <div class="mb-3">
        <button type="submit" name="login" class="btn btn-primary form-control">Ingrese</button>
      </div>
    </form>

    <?php
    // Boton login con validaciones
    if (isset($_POST['login'])) {
      if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
        $login = "SELECT usuario, clave FROM usuario WHERE usuario = ? AND clave = ?";
        $stmt = mysqli_prepare($conectarBD, $login);
        mysqli_stmt_bind_param($stmt, "ss", $_POST['usuario'], $_POST['clave']);
        mysqli_stmt_execute($stmt); // Execute the statement first
        $result = mysqli_stmt_get_result($stmt); // Then get the result
        if (mysqli_num_rows($result) > 0) {
          header('location: Views/listado.php');
          exit;
        } else {
          echo " <div class='alert alert-danger' role='alert'> Usuario o contraseña incorrectos</div>";
        }
      } else {
        echo " <div class='alert alert-danger' role='alert'> Ingrese usuario y contraseña</div>";
      }
    }
    ?>

    <!--Boton modal Registro-->
    <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#modalRegistrar">
      Registrese
    </button>
  </div>
</div>



<?php
include_once("Components/modalRegistrar.php");
?>