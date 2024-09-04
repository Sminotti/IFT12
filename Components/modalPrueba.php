<?php
include_once("../Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("../Models/peticionesSql.php");
$idEmpleado = $_GET['idEmpleado'] ?? null;
?>

<!-- Modal Registrar-->
<div class="modal fade " id="modalPrueba<?php $idEmpleado; ?>" tabindex="-1" aria-labelledby="modalPruebaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <div class="card " style="width: 100%; height: auto ">
                    <div class="card-header">
                        <h5 class="card-title text-center">Actualizacion de usuario </h5>
                    </div>
                    <div class="card-body">
                        <?php
                        // Listar empleado para editar
                        $listarRegistro = mysqli_query($conectarDB, $listarEmpleado);
                        while ($rowModificar = mysqli_fetch_array($listarRegistro)) { ?>
                            <form method="post" action="modalPrueba.php" class="d-grid bg-dark p-2 rounded">
                                <!-- OBTENER LOS ID -------------------------------------------------------------------------------------------------------->
                                <input type="text" name="idPersona" value="<?php echo $rowModificar["idPersona"]; ?>" style="display: none;">
                                <input type="text" name="idUsuario" value="<?php echo $rowModificar["idUsuario"]; ?>" style="display: none;">
                                <input type="text" name="idCargo" value="<?php echo $rowModificar["idCargo"]; ?>" style="display: none;">
                                <input type="text" name="idEmpleado" value="<?php echo $rowModificar["idEmpleado"]; ?>" style="display: none;">
                                <!-- OBTENER LOS ID -------------------------------------------------------------------------------------------------------->
                                <div class="d-grid gap-3">

                                    <div class="p-2 bg-light border">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Email</span>
                                            <input type="email" name="usuario" value="<?php echo $rowModificar["usuario"]; ?>" class="form-control" placeholder="Nombre de usuario" id="registrarEmail" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1">Password</span>
                                            <input type="password" name="clave" value="<?php echo $rowModificar["clave"]; ?>" class="form-control" placeholder="Inegrese password" id="registrarClave" aria-label="Inegrese password" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="p-2 bg-light border">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">Nombre</span>
                                            <input type="text" name="nombre" value="<?php echo $rowModificar["nombre"]; ?>" class="form-control" id="registrarNombre" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1">Apellido</span>
                                            <input type="text" name="apellido" value="<?php echo $rowModificar["apellido"]; ?>" class="form-control" id="registrarApellido" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1">Edad</span>
                                            <input type="text" name="edad" value="<?php echo $rowModificar["edad"]; ?>" class="form-control" id="registrarEdad" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1">Dni</span>
                                            <input type="text" name="dni" value="<?php echo $rowModificar["dni"]; ?>" class="form-control" id="registrarDni" aria-label="Nombre de usuario" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="p-2 bg-light border">
                                        <div class="input-group">
                                            <!-- LISTA DESPLEGABLE CARGAOS --------------------------------------->
                                            <span class="input-group-text" value="<?php echo $rowModificar["legajo"]; ?>" disabled id="basic-addon1">Legajo</span>
                                            <input type="text" name="legajo" id="registrarLegajo">
                                            <span class="input-group-text" id="basic-addon1">Cargo a desempeñar</span>
                                            <select name="cargos" class="form-select btn btn-secondary" style="width: auto;">
                                                <?php
                                                $listarCargos = mysqli_query($conectarDB, $listarCargo);
                                                while ($row = mysqli_fetch_array($listarCargos)) { ?>
                                                    <option value="<?php echo $row["idCargo"] ?>"><?php echo $row["cargo"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- LISTA DESPLEGABLE CARGAOS --------------------------------------->

                                    <div class="p-2 bg-light border">
                                        <div class="input-group">
                                            <button type="submit" name="modificar" class="btn btn-primary form-control">Actualizar empleado</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                // Modificar empleado
                                if (isset($_POST['modificar'])) {
                                    $idCargo = $_POST['cargos'] ?? null;

                                    // Actualizar tabla persona
                                    $updatePersona = "UPDATE persona SET nombre=?, apellido=?, edad=?, dni=? WHERE idPersona=?";
                                    $stmtPersona = $conectarDB->prepare($updatePersona);
                                    $stmtPersona->bind_param("ssssi", $nombre, $apellido, $edad, $dni, $idPersona);


                                    // Actualizar tabla usuario
                                    $updateUsuario = "UPDATE usuario SET usuario=?, clave=? WHERE idPersona=?";
                                    $stmtUsuario = $conectarDB->prepare($updateUsuario);
                                    $stmtUsuario->bind_param("ssi", $usuario, $clave, $idPersona);


                                    // Actualizar idCargo de la tabla empleado
                                    $updateEmpleado = "UPDATE empleado SET idCargo=? WHERE idPersona=?";
                                    $stmtEmpleado = $conectarDB->prepare($updateEmpleado);
                                    $stmtEmpleado->bind_param("ii", $idCargo, $idPersona);


                                    if (!$stmtPersona->execute() || !$stmtUsuario->execute() || !$stmtEmpleado->execute()) {
                                        echo "Error al actualizar: " . $stmtPersona->error . $stmtUsuario->error . $stmtEmpleado->error;
                                        //} else {

                                        // header('location: listado.php');
                                    }
                                }
                                ?>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>