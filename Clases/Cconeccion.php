<?php
//CONECION A LA BASE DE DATOS//
class Cconeccion
{
    public static function ConeccionDB()
    {

        // Configuración de la base de datos
        $host = 'localhost'; // Dirección del servidor de la base de datos
        $username = 'root'; // Usuario de la base de datos
        $password = ''; // Contraseña de la base de datos
        $dbname = 'personal'; // Nombre de la base de datos

        // Crear conexión con mysqli
        $conectarDB = new mysqli($host, $username, $password, $dbname);

        // Verificar conexión
        if ($conectarDB->connect_error) {
            die("Error de conexión: " . $conectarDB->connect_error);
        }

        return $conectarDB;
    }
}
