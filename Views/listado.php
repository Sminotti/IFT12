<?php
include_once("../Clases/Cconeccion.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../Views/noInicioSesion.php');
    exit;
}

// Define las consultas necesarias
$listarCargo = "SELECT idCargo, cargo FROM cargos";
$listarEmpleados = "SELECT e.idEmpleado, e.legajo, u.usuario, p.nombre, p.apellido, p.edad, p.dni, c.cargo 
                    FROM empleado e
                    JOIN usuario u ON e.idUsuario = u.idUsuario
                    JOIN persona p ON e.idPersona = p.idPersona
                    JOIN cargos c ON e.idCargo = c.idCargo";
?>
<!DOCTYPE html>
<html lang="es">

<?php include_once("../Template/head.php"); ?>

<body class="content">

  <?php include_once("../Template/navBar.php"); ?>

  <div class="centrar">
    <div class="mt-5 card col-10">
      <h5 class="card-header">Persona <?php echo " " . htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8'); ?></h5>
      <div class="card-body">
        <div class="text-center">
          <div class="row">
            <div class="col-2">
              <h5 class="alert alert-secondary text-bg-dark">Ingrese empleado</h5>
              <form method="post" action="listado.php" class="d-grid bg-dark p-2 rounded">
                <!-- Formulario de creación de empleado -->
                <input type="text" name="legajo" placeholder="legajo" class="mt-2 form-control">
                <input type="email" name="usuario" placeholder="usuario" class="mt-2 form-control">
                <input type="password" name="clave" placeholder="clave" class="mt-2 form-control">
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
                <button type="submit" name="crearEmpleado" class="mt-2 btn btn-primary form-control">Crear empleado</button>
                <?php
                // Crear persona
                if (isset($_POST['crearEmpleado'])) {

                  $idCargo = $_POST['cargos'] ?? null;
                  $ingresarPersona = mysqli_query($conectarDB, $crearPersona);
                  $idPersonaObtenido = mysqli_insert_id($conectarDB);

                  if (isset($idPersonaObtenido)) {

                    $clave = $_POST['clave'];
                    $hashed_password = password_hash($clave, PASSWORD_DEFAULT);
                    $registrarPersonaQuery = "INSERT INTO usuario (idPersona, usuario, clave) VALUES (?, ?, ?)";
                    $stmt = mysqli_prepare($conectarDB, $registrarPersonaQuery);
                    mysqli_stmt_bind_param($stmt, "sss", $idPersonaObtenido, $usuario, $hashed_password);
                    mysqli_stmt_execute($stmt);

                    $idUsuarioObtenido = mysqli_insert_id($conectarDB);

                    if (isset($idCargo)) {
                      $crearEmpleado = "INSERT INTO empleado (idCargo,idPersona,idUsuario) VALUES (?,?,?)";
                      $stmt = mysqli_prepare($conectarDB, $crearEmpleado);
                      mysqli_stmt_bind_param($stmt, "sss", $idCargo, $idPersonaObtenido, $idUsuarioObtenido);
                      mysqli_stmt_execute($stmt);
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
                  header('locationn: ../index.php');
                }
                ?>
              </form>
            </div>
            <div class="col-10">
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
                  $listarRegistros = mysqli_query($conectarDB, $listarEmpleados);
                  while ($row = mysqli_fetch_array($listarRegistros)) { ?>
                    <tr>
                      <td><?php echo $row["idEmpleado"]; ?></td>
                      <td><?php echo $row["legajo"]; ?></td>
                      <td><?php echo $row["usuario"]; ?></td>
                      <td><?php echo $row["nombre"]; ?></td>
                      <td><?php echo $row["apellido"]; ?></td>
                      <td><?php echo $row["edad"]; ?></td>
                      <td><?php echo $row["dni"]; ?></td>
                      <td><?php echo $row["cargo"]; ?></td>
                      <td>
                        <a class="btn btn-primary" href="../Views/modificar.php?idEmpleado=<?php echo $row["idEmpleado"]; ?>"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-danger" href="../Views/eliminar.php?idEmpleado=<?php echo $row["idEmpleado"]; ?>"><i class="bi bi-trash3-fill"></i></a>
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

  <?php include_once("../Template/footer.php"); ?>

</body>

</html>