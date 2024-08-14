<?php
include 'config.php';

$id = $_GET['id'];
$stmt = $mysqli->prepare("SELECT * FROM productos WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

echo json_encode($product);

$stmt->close();
$mysqli->close();
?>
