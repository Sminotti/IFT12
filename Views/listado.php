<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
?>
<!DOCTYPE html>
<html lang="es">

<?php include_once("../Template/head.php"); ?>

<body class="content">

  <?php include_once("../Template/navBar.php"); ?>

  <div class="centrar">
    <div class="mt-5 card col-10">
      <h5 class="card-header">Personal</h5>
      <div class="card-body">
        <div class=" text-center ">
          <div class="row">
            <div class=" col-2 "><!--Formulario Crear empleado -->
              <h5 class="alert alert-secondary text-bg-dark">Ingrese empleado</h5>
              <form method="post" class="d-grid bg-dark p-2 rounded">
                <input type="text" name="legajo" placeholder="legajo" class="mt-2 form-control">
                <input type="text" name="usuario" placeholder="usuario" class="mt-2 form-control">
                <input type="text" name="clave" placeholder="clave" class="mt-2 form-control">
                <input type="text" name="nombre" placeholder="nombre" class=" mt-2 form-control">
                <input type="text" name="apellido" placeholder="apellido" class="mt-2 form-control">
                <input type="text" name="edad" placeholder="edad" class="mt-2 form-control">
                <input type="text" name="dni" placeholder="dni" class="mt-2 form-control">
                <div>
                  <div class="input-group">
                    <!-- LISTA DESPLEGABLE CARGAOS --------------------------------------->
                    <select name="cargos" class="mt-2 form-select form-control btn btn-secondary">
                      <?php
                      $listarCargos = mysqli_query($conectarDB, $listarCargo);
                      while ($row = mysqli_fetch_array($listarCargos)) { ?>
                        <option value="<?php echo $row["idCargo"] ?>"><?php echo $row["cargo"] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- LISTA DESPLEGABLE CARGAOS --------------------------------------->
                <button type="submit" name="enviar" class="mt-2 btn btn-primary form-control">Crear empleado</button>
                <?php
                // Crear persona
                if (isset($_POST['enviar'])) {
                  $idCargo = $_POST['cargos'] ?? null;
                  $idPersona = $_POST['idPersona'] ?? null;
                  $ingresarPersona = mysqli_query($conectarDB, $crearPersona);
                  $idPersonaObtenido = mysqli_insert_id($conectarDB);

                  if (isset($idPersonaObtenido)) {
                    $crearUsuario = "INSERT INTO usuario (idPersona, usuario, clave) VALUES ('$idPersonaObtenido', '$usuario', '$clave')";
                    $ingresarUsuario = mysqli_query($conectarDB, $crearUsuario);
                    $idUsuarioObtenido = mysqli_insert_id($conectarDB);
                    if (isset($idCargo)) {
                      $crearEmpleado = "INSERT INTO empleado (idCargo,idPersona,idUsuario) VALUES ('$idCargo','$idPersonaObtenido','$idUsuarioObtenido')";
                      $IngresarEmpleado = mysqli_query($conectarDB, $crearEmpleado);
                    }
                    echo "<script>alert('Usuario'creado exitosamente);</script>";
                  } else {
                    echo "<script>alert('Error al crear usuario.');</script>";
                  }
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

            <div class="col-10"> <!--Tabla de datos -->
              <table class="table text-center">
                <thead>
                  <tr class="table-dark rounded">
                    <th scope="col">#</th>
                    <th scope="col">Legajo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>

                <tbody>

                  <?php
                  // Listar personas
                  $listarRegistros = mysqli_query($conectarDB, $listarEmpleados);
                  while ($row = mysqli_fetch_array($listarRegistros)) { ?>
                    <tr class="text-center">
                      <td><?php echo $row["idEmpleado"]; ?></td>
                      <td><?php echo $row["legajo"]; ?></td>
                      <td><?php echo $row["usuario"]; ?></td>
                      <td><?php echo $row["nombre"]; ?></td>
                      <td><?php echo $row["apellido"]; ?></td>
                      <td><?php echo $row["edad"]; ?></td>
                      <td><?php echo $row["dni"]; ?></td>
                      <td><?php echo $row["cargo"]; ?></td>
                      <td>
                        <!-- Button modal editar-->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalModificar" data-id-empleado="<?php echo $row["idEmpleado"]; ?>"> Modal </button>
                        <!-- Button modificar-->
                        <a class="btn btn-primary" href="../Views/modificar.php?idEmpleado=<?php echo $row["idEmpleado"]; ?>"><i class="bi bi-pencil-square"></i> </a>
                        <!-- Button eliminar-->
                        <a class="btn btn-danger" href="../Views/eliminar.php?idEmpleado=<?php echo $row["idEmpleado"]; ?>"> <i class="bi bi-trash3-fill"></i></a>
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