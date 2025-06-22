<?php

#iniciar la sesión
session_start();

include "../components/conexion.php";

#Capturamos las variables de inicio de sesión
$correo = $_POST["email"];
$password = $_POST["password"];

#Consultamos las variables e inicializamos la conexion
$SQL = "SELECT * FROM usuarios WHERE correo_electronico = ':correo_electronico' ";
// echo $SQL;
// die(); // Para depuración, eliminar en producción

$consulta = $conexion->prepare($SQL);
$consulta->bindParam(":correo_electronico", $correo); 
$consulta->execute();
$usuario = $consulta->fetch(PDO::FETCH_ASSOC); 

if ($usuario && password_verify($password, $usuario["contrasena"])){ 
    # iniciamos las variables de sesion 
    $_SESSION['usuario_id'] = $usuario["id_usuario"];
    $_SESSION['usuario_nombre'] = $usuario["nombre"]; 
    
    # reubicamos al usuario en la pagina principal 
    header("location:../modules/Productos/index.php"); 
}else{
    header("location:../index.php?error=1"); 
}

?>