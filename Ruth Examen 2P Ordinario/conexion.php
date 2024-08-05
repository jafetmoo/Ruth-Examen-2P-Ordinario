<?php
// Ejemplo básico de conexión a SQL Server
$serverName = "LAPTOP-JAFETMOO"; // Nombre del servidor SQL Server
$connectionOptions = array(
    "Database" => "libreria", // Nombre de la base de datos
    "Uid" => "jafet", // Usuario de SQL Server
    "PWD" => "12345678" // Contraseña de SQL Server
);

// Conexión a SQL Server mediante autenticación SQL
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Verificar la conexión
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}