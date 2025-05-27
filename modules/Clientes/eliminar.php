<?php
include "../../components/conexion.php";
$id = $_GET['id'];
$stmt = $conexion->prepare("DELETE FROM clientes WHERE id_cliente = :id");
$stmt->execute([':id' => $id]);
header('Location: index.php');