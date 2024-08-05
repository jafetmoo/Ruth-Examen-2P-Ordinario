<?php
include 'conexion.php';

if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['fecha_publicacion']) && isset($_POST['autor_id'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $autor_id = $_POST['autor_id'];

    $sql = "UPDATE Libros SET titulo = ?, fecha_publicacion = ?, autor_id = ? WHERE id = ?";
    $params = array($titulo, $fecha_publicacion, $autor_id, $id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("Location: index.php");
    }
}
