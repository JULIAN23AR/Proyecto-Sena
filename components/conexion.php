<?php
#Variables de conexion

$usuario = "root";
$contrasena = "";
$base_datos = "proyecto_sena";
$host = "localhost";

try {
    $conexion = new PDO("mysql:
    host=$host;
    dbname=$base_datos", 
    $usuario, 
    $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) { # Captura de excepciones
    // Manejo de errores
    echo "Error de conexión: " . $e->getMessage();
}