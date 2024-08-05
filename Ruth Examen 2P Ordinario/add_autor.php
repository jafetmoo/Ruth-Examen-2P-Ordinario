<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $sql = "INSERT INTO Autores (nombre, apellidos, fecha_nacimiento) VALUES (?, ?, ?)";
    $params = array($nombre, $apellidos, $fecha_nacimiento);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("Location: index.php");
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}