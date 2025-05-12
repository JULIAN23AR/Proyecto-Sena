<?php
// Incluir conexión a la base de datos
include "../../components/conexion.php";

// Capturar las variables del formulario
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo_electronico = filter_var($_POST['correo_electronico'], FILTER_SANITIZE_EMAIL);
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$tipo_usuario = $_POST['area'];
$fecha_registro = $_POST['fecha_registro'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];

try {
    // Insertar el nuevo usuario en la base de datos
    $SQL = "INSERT INTO usuarios 
                (documento, nombre, apellido, telefono, correo_electronico, contrasena, area, rol, estado)
            VALUES
                (:documento, :nombre, :apellido, :telefono, :correo_electronico, :contrasena, :area, :rol, :estado)";
    
    $consulta = $conexion->prepare($SQL);
    $consulta->bindParam(":documento", $documento);
    $consulta->bindParam(":nombre", $nombre);
    $consulta->bindParam(":apellido", $apellido);
    $consulta->bindParam(":telefono", $telefono);
    $consulta->bindParam(":correo_electronico", $correo_electronico);
    $consulta->bindParam(":contrasena", $contrasena);
    $consulta->bindParam(":area", $tipo_usuario);
    // $consulta->bindParam(":fecha_registro", $fecha_registro);
    $consulta->bindParam(":rol", $rol);
    $consulta->bindParam(":estado", $estado);

    if ($consulta->execute()) {
        header("Location: ../users/Index.php");
        exit;
    } else {
        echo "Error al insertar el usuario.";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
