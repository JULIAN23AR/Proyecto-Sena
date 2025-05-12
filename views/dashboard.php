Ingresar toda la estructura de la página de inicio del sistema.
*/

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: ../login.php');
    exit();
}
?>

<h1>Bienvenido</h1>