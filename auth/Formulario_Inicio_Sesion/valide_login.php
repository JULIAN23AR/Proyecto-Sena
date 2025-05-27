<?php

#Iniciar sesiones
session_start();

#Capturamos las variables de sesión
$correo = $_POST("email");
$contrasena = $_POST("password");

#Preparamos la consulta a la BD
$SQL = "SELECT * FROM usuarios WHERE email = :email";
$consulta = $conexion->prepare($SQL);
$consulta->bindParam(":email", $correo);
$consulta->execute();
$usuario = $consulta->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($contrasena, $usuario["passeord"])){
    #iniciamos las variables de sesion
    $_SESSION['usuario_id'] = $usuario["id"];
    $_SESSION['usuario_nombre'] = $usuario["nombre"];
    #reubicamos al usuario en la pagina principal
    header("location:../dashboard/dashboard.php");
}else{
    header("location:../login.php?error=1");
}

?>