<?php
include "../../components/conexion.php";

$SQL = "INSERT INTO clientes (documento, nombre, apellido, telefono, correo_electronico, direccion, estado)
        VALUES (:documento, :nombre, :apellido, :telefono, :correo, :direccion, :estado)";
$stmt = $conexion->prepare($SQL);
$stmt->execute([
    ':documento' => $_POST['documento'],
    ':nombre' => $_POST['nombre'],
    ':apellido' => $_POST['apellido'],
    ':telefono' => $_POST['telefono'],
    ':correo' => $_POST['correo_electronico'],
    ':direccion' => $_POST['direccion'],
    ':estado' => $_POST['estado']
]);

header('Location: index.php');