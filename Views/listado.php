<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idPersona = $_GET['idPersona'] ?? null;

?>
<!DOCTYPE html>
<html lang="es">

<?php include_once("../Template/head.php"); ?>

<body class="content">

  <?php include_once("../Template/navBar.php"); ?>

  <div class="centrar">
    <div class="mt-5 card col-9">
      <h5 class="card-header">Personal</h5>
      <div class="card-body">
        <div class="container text-center ">
          <div class="row">
            <div class=" col-3 "><!--Formulario Crear persona -->
              <h5 class="alert alert-secondary text-bg-dark">Ingrese sus datos</h5>
              <form method="post" class="d-grid bg-dark p-2 rounded">
                <input type="text" name="nombre" placeholder="nombre" class=" form-control">
                <input type="text" name="apellido" placeholder="apellido" class="mt-2 form-control">
                <input type="text" name="edad" placeholder="edad" class="mt-2 form-control">
                <input type="text" name="dni" placeholder="dni" class="mt-2 form-control">
                <button type="submit" name="enviar" class="mt-2 btn btn-primary form-control">Crear persona</button>
                <?php
                // Crear persona
                if (isset($_POST['enviar'])) {
                  $ingresarRegistro = mysqli_query($conectarDB, $insertarPersona);
                }
                ?>
                <?php
                // Volver al login
                if (isset($_POST['volverLogin'])) {
                  header('location: ../index.php');
                }
                ?>
              </form>
            </div>

            <div class="col"> <!--Tabla de datos -->
              <table class="table text-center">
                <thead>
                  <tr class="table-dark rounded">
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Dni</th>
           
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>

                  <?php
                  // Listar personas
                  $listarRegistros = mysqli_query($conectarDB, $listar);
                  while ($row = mysqli_fetch_array($listarRegistros)) { ?>
                    <tr class="text-center">
                      <td><?php echo $row["idPersona"]; ?></td>
                      <td><?php echo $row["nombre"]; ?></td>
                      <td><?php echo $row["apellido"]; ?></td>
                      <td><?php echo $row["edad"]; ?></td>
                      <td><?php echo $row["dni"]; ?></td>
                
                      <td>
                        <!-- Button modal editar-->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistro?idPersona=<?php  echo $row["idPersona"]; ?>">  Modal </button>
                        <!-- Button eliminar-->
                        <a class="btn btn-primary" href="../Views/modificar.php?idPersona=<?php echo $row["idPersona"]; ?>"> <i class="bi bi-pencil-square"></i> </a>
                        <!-- Button eliminar-->
                        <a class="btn btn-danger" href="../Views/eliminar.php?idPersona=<?php echo $row["idPersona"]; ?>"> <i class="bi bi-trash3-fill"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>           
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("../Components/modalModificar.php"); ?>
  <?php include_once("../Template/footer.php"); ?>

</body>

</html>