<?php
include 'conexion.php';

if (isset($_POST['titulo']) && isset($_POST['fecha_publicacion']) && isset($_POST['autor_id'])) {
    $titulo = $_POST['titulo'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $autor_id = $_POST['autor_id'];

    $sql = "INSERT INTO Libros (titulo, fecha_publicacion, autor_id) VALUES (?, ?, ?)";
    $params = array($titulo, $fecha_publicacion, $autor_id);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        header("Location: index.php");
    }
}
