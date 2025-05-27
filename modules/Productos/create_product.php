<?php
#Incluir conexión a la base de datos
include "..//../components/conexion.php";

#Capturar las variables del formulario
$nombre = $_POST ['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$imagen = $_POST['imagen'];
$estado = $_POST['estado'];

?>