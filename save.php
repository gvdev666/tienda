<?php
include 'config.php';

$id = $_POST['id'] ?? '';
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

if ($id) {
    $stmt = $mysqli->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=? WHERE id=?");
    $stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $id);
} else {
    $stmt = $mysqli->prepare("INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $nombre, $descripcion, $precio);
}

if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'error';
}
$stmt->close();
$mysqli->close();
?>
