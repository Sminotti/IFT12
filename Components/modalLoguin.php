<?php
require_once('Clases/Cconeccion.php');
$conectarDB = Cconeccion::ConeccionDB();
session_start();

if (isset($_POST['botonLogin'])) {

    if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {
        $loginQuery = "SELECT usuario, clave FROM usuario WHERE usuario = ? AND clave = ?";
        $stmt = mysqli_prepare($conectarDB, $loginQuery);
        mysqli_stmt_bind_param($stmt, "ss", $_POST['usuario'], $_POST['clave']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $usuarioBD, $claveHashBD);
        mysqli_stmt_fetch($stmt);

        // Verify password using password_verify()
        if (!empty($claveHashBD)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['logged_usuario'] = $usuarioBD;
            $_SESSION['logged_clave'] = $claveHashBD;

            echo "usuario: " . $usuarioBD . "clave: " . $claveHashBD;
            header('location: ../Views/listado.php');
            exit;
        } else {
            // Display error message
            $error_message = 'Usuario o contraseña incorrecta';
        }
    }
}
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
                                <button type="submit" name="botonLogin" class="btn btn-primary form-control">Ingrese</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<html>
    <!-- your HTML code here -->
    <?php if (isset($error_message)): ?>
        <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center mx-auto mt-5" role="alert" style="height: 10vh; width: 50vh;">
            <strong> <?= $error_message ?> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- rest of the HTML code -->
</html>