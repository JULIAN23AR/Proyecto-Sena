<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="mb-4">Listado de Clientes</h2>
      <a href="crear.php" class="btn btn-success mb-3">+ Agregar Cliente</a>
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          #Incluimos la conexión a la base de datos
          include "../../components/conexion.php";

          #Realizamos la consulta para obtener los clientes
          $SQL = "SELECT * FROM clientes";

          // Ejecutar la consulta
          $consulta = $conexion->prepare($SQL);
          $consulta->execute();
          $clientes = $consulta->fetchall(PDO::FETCH_ASSOC);
          
          foreach ($clientes as $cliente): {
            echo "<tr>";
            echo "<td>" . $cliente['id_cliente'] . "</td>";
            echo "<td>" . $cliente['documento'] . "</td>";
            echo "<td>" . $cliente['nombre'] . "</td>";
            echo "<td>" . $cliente['telefono'] . "</td>";
            echo "<td>" . $cliente['correo'] . "</td>";
            echo "<td>" . ($cliente['estado'] == 1 ? "Activo" : "Inactivo") . "</td>"; // Mostrar el estado del cliente $cliente['estado'] . "</td>";
            echo "<td>";
            echo "<a href='editar.php?id_cliente=" . $cliente['id_cliente'] . "' class='btn-action btn btn-outline-warning btn-sm me-2'><i class='fa-solid fa-pen-to-square'></i></a>";
            echo "<a href='eliminar.php?id_cliente=" . $cliente['id_cliente'] . "' class='btn-action btn btn-outline-danger btn-sm'><i class='fa-solid fa-trash'></i></a> onclick='return confirm(\"¿Estás seguro de eliminar este cliente?\")'>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
      </tbody>
    </table>
  </div>
</body>
</html>