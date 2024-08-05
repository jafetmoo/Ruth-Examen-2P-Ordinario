<?php
include 'conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM Libros WHERE id = ?";
    $params = array($id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("Location: index.php");
    }
}
