<?php
include_once("Clases/Cconeccion.php");
$conectarDB = Cconeccion::ConeccionDB();
include_once("Models/peticionesSql.php");
session_start();
?>

<div class="modal fade " id="modalLoguin" tabindex="-1" aria-labelledby="modalLoguinLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <div class="card " style="width: 100%; height: auto ">
                    <div class="card-header">
                        <h5 class="card-title text-center">Ingrese Usuario y Contraseña</h5>
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
                                  
                                        $_SESSION['usuario_logueado']= $result['usuario'];
                                    
                                    
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>