<?php

// Incluir la conexión a la base de datos

include "conexion.php";

// Capturar las variables del formulario

$documento = $_POST['documento'];
$nombre = $_POST['nombre'];   
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo_electronico = $_POST['correo_electronico'];
$contrasena = $_POST['contrasena'];
$tipo_usuario = $_POST['tipo_usuario'];
$fecha_creacion = $_POST['fecha_creacion'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];

// Consulta para insertar los datos

$SQL = "INSERT INTO user (documento, nombre, apellido, telefono, correo_electronico, contrasena, tipo_usuario, fecha_creacion, rol, estado)";
$consulta = $conexion->prepare($SQL);

// Vincular los parámetros

$consulta->bindParam(":documento", $documento);
$consulta->bindParam(":nombre", $nombre);
$consulta->bindParam(":apellido", $apellido);
$consulta->bindParam(":telefono", $telefono);
$consulta->bindParam(":correo_electronico", $correo_electronico);
$consulta->bindParam(":contrasena", $contrasena);
$consulta->bindParam(":tipo_usuario", $tipo_usuario);
$consulta->bindParam(":fecha_creacion", $fecha_creacion);
$consulta->bindParam(":rol", $rol);
$consulta->bindParam(":estado", $estado);

// Ejecutar la consulta
if ($consulta->execute()) {
    header('Location: index.php');
} else {
    header('Location: Crear_Registros.php');
}

?>