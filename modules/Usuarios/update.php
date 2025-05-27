<?php
#incluimos la conexion a la base de datos
include "../../components/conexion.php";

#incluimos los datos enviados desde el formulario
$id_usuario = $_POST['id_usuario'];
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo_electronico = filter_var($_POST['correo_electronico'], FILTER_SANITIZE_EMAIL);
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
$tipo_usuario = $_POST['area'];
// $fecha_registro = $_POST['fecha_registro'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];

try {
    // Insertar el nuevo usuario en la base de datos
    $SQL = "UPDATE usuarios 
                SET
                    documento = :documento,
                    nombre = :nombre,
                    apellido = :apellido,
                    telefono = :telefono,
                    correo_electronico = :correo_electronico,
                    contrasena = :contrasena,
                    area = :area,
                    rol = :rol,
                    estado = :estado
                WHERE id_usuario = :id_usuario";
            
    
    $consulta = $conexion->prepare($SQL);


    $consulta->bindParam(":id_usuario", $id_usuario);
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
        header("Location: ../users/index.php");
    } else {
        $errorInfo = $consulta->errorInfo();
        echo "Error en la consulta: " . $errorInfo[2];
    }
    

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
