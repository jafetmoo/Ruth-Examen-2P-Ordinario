<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM Autores WHERE id = ?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("location: index.php");
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
