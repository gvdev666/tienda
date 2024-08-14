<?php
$mysqli = new mysqli('localhost', 'root', '', 'tienda');
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}
?>
