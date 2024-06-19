<?php
include_once("Clases/Cconeccion.php");

function verificarLogin($usuario, $password)
{
    include_once("Models/peticionesSql.php");
    $conectarDB = Cconeccion::ConeccionDB();
    $buscarUsuario = "";
    $buscarUsuario = mysqli_query($conectarDB, $login);
    while ($row = mysqli_fetch_array($buscarUsuario)) {
        if ($row['usuario'] == $usuario && $row['password'] == $password)
            return true;
    }
}
