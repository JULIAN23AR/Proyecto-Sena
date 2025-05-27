<?php
include "../../components/conexion.php";

$SQL = "UPDATE clientes SET
        documento = :documento,
        nombre = :nombre,
        apellido = :apellido,
        telefono = :telefono,
        correo_electronico = :correo,
        direccion = :direccion,
        estado = :estado
        WHERE id_cliente = :id";
$stmt = $conexion->prepare($SQL);
$stmt->execute([
    ':documento' => $_POST['documento'],
    ':nombre' => $_POST['nombre'],
    ':apellido' => $_POST['apellido'],
    ':telefono' => $_POST['telefono'],
    ':correo' => $_POST['correo_electronico'],
    ':direccion' => $_POST['direccion'],
    ':estado' => $_POST['estado'],
    ':id' => $_POST['id_cliente']
]);

header('Location: index.php');