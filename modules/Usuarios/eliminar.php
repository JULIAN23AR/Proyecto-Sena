<?php 

include "../../components/conexion.php";

#Obetenemos los datos enviados desde el formulario
$id = $_GET["id_usuario"];

#Consulta SQL para eliminar
$sql = "DELETE FROM usuarios WHERE id_usuario = :id_usuario; ";

#preparamos la consulta
$consulta = $conexion->prepare($sql);

#Remplazamos los valores por las variables
$consulta->bindParam(":id_usuario", $id);

#Ejecutamos la consulta
if($consulta->execute()){
    header("location:index.php");
}else{
    echo "Error al eliminar el usuario";
}

?>