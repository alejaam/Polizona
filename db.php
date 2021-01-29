<?php
$server   = "68.70.164.26"; //Server adress
$database = "polizona_125"; // DB name
$username = "polizona_125"; // DB user
$password = "TresxDos=6"; // DB password

$conexion = mysqli_connect($server, $username, $password, $database);
if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}