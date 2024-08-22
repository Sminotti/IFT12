<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idPersona = $_GET['idEmpleado'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">

<?php include_once("../Template/head.php"); ?>

<body class="content">

  <?php include_once("../Template/navBar.php"); ?>

  <div class="centrar">

    <div class="card " style="width: 300px; height: auto ">
      <div class="card-header">
        Modificar datos
      </div>
      <div class="card-body">
        <?php
        // Listar empleado para editar
        $listarRegistro = mysqli_query($conectarDB, $listarEmpleado);
        while ($row = mysqli_fetch_array($listarRegistro)) { ?>
          <form method="post" class="d-grid bg-dark p-2 rounded">
          <input type="text" name="legajo" value="<?php echo $row["legajo"]; ?>" class=" form-control">
            <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>" class=" mt-2 form-control">
            <input type="text" name="apellido" value="<?php echo $row["apellido"]; ?>" class="mt-2 form-control">
            <input type="text" name="edad" value="<?php echo $row["edad"]; ?>" class="mt-2 form-control">
            <input type="text" name="dni" value="<?php echo $row["dni"]; ?>" class="mt-2 form-control">
            <input type="text" name="usuario" value="<?php echo $row["usuario"]; ?>" class="mt-2 form-control">
            <input type="text" name="clave" value="<?php echo $row["clave"]; ?>" class="mt-2 form-control">
            <button type="submit" name="modificar" class="mt-2 btn btn-primary form-control">Aceptar cambios</button>
            <?php
            // Modificar empleado
            if (isset($_POST['modificar'])) {
              $modificarRegistro = mysqli_query($conectarDB, $editar);
              header('location: listado.php');
            }
            ?>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>