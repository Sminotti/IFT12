<?php
class Cconeccion
{
    public static function ConeccionDB()
    {
        $servidor = "localhost";
        $usuario = "root";
        $clave = "";
        $bd = "personal";

        $conectarDB = new mysqli($servidor, $usuario, $clave, $bd);

        // Check connection
        if ($conectarDB->connect_error) {
            echo "Fallo la coneccion con la base de datos: " . $conectarDB->connect_error;
            exit();
        }

        return $conectarDB;
    }
  
}
