<?php
include 'config.php';

// Obtener el ID del producto que se desea eliminar
$id = $_POST['id'];

// Preparar la consulta SQL para eliminar el registro
$stmt = $mysqli->prepare("DELETE FROM productos WHERE id=?");
$stmt->bind_param("i", $id);

// Ejecutar la consulta y verificar si la eliminación fue exitosa
if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'error';
}

// Cerrar la declaración y la conexión a la base de datos
$stmt->close();
$mysqli->close();
?>
