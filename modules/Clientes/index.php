<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta namespace="theme-color" content="#3fbcff" />

    <!-- Contenedor de Boostrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7"
      crossorigin="anonymous" />
    <script
      src="https://kit.fontawesome.com/eeb2293ae5.js"
      crossorigin="anonymous"></script>

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../../diseñoWeb/Estilos/style.css" />
    <title>Clientes</title>
  </head>
  <body>
    <!-- Barra lateral azul -->

    <div class="d-flex" id="wrapper">
      <nav id="sidebar" class="bg-primary d-none">
        <div class="sidebar-header text-white d-flex justify-content-center">
          <i class="fa-solid fa-boxes-stacked me-2"></i>
          <span class="fw-bold">Inventario</span>
        </div>
        <ul class="list-content list-unstyled fs-7">
          <li>
            <i class="fa-solid fa-right-to-bracket"></i>
            <a href="../Clientes/index.php">Clientes</a>
          </li>
          <li>
            <i class="fa-solid fa-right-to-bracket"></i>
            <a href="../Empleados/index.php">Empleados</a>
          </li>
          <li>
            <i class="fa-solid fa-right-to-bracket"></i>
            <a href="../Productos/index.php">Productos</a>
          </li>
          <li>
            <i class="fa-solid fa-right-to-bracket"></i>
            <a href="../Usuarios/index.php">Usuarios</a>
          </li>
          <li>
            <i class="fa-solid fa-right-to-bracket"></i>
            <a href="../Vendedores/index.php">Vendedores</a>
          </li>
        </ul>
      </nav>

      <!-- Page Content -->
      <div id="page-content-wrapper" class="w-100">
        <!-- Top navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
          <div class="d-flex w-100 justify-content-between align-items-center">
            <button class="btn btn-outline-light" id="menu-toggle">
              <i class="fa fa-bars"></i>
            </button>
            <div class="d-flex align-items-center gap-3">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-primary"
                onclick="window.location.href='/PROYECTO_SENA/auth/Formulario_Creacion/create_user.html'">
                <i class="fa-solid fa-plus"></i>
                Crear Cliente
              </button>

              <!-- Lista de Usuarios -->
              <select
                class="form-list form-select-sm w-auto"
                name="option"
                id="option">
                <option value="1">Clientes</option>
                <option value="2">Empleados</option>
                <option value="3">Productos</option>
                <option value="4">Usuarios</option>
                <option value="5">Vendedores</option>
              </select>
            </div>
            <!-- Button trigger modal -->
          </div>
        </nav>

        <section class="cliente-section mt-3 px-4 py-2">
          <h2 class="mb-4 text-light fs-3">Lista de Clientes</h2>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="table-dark">
                <tr>
                  <th>id_cliente</th>
                  <th>Documento</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Correo Electrónico</th>
                  <th>Estado</th> 
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                <!-- Más registros -->

                <?php
                // Conexión a la base de datos
                include "../../components/conexion.php";

                // Consulta para obtener los usuarios
                $SQL =  "SELECT * FROM clientes";

                // Ejecutar la consulta
                $consulta = $conexion->prepare($SQL);
                $consulta->execute();
                $clientes = $consulta ->fetchall(PDO::FETCH_ASSOC);

                // Mostrar los usuarios en la tabla
                foreach ($clientes as $cliente) {
                  echo "<tr>";
                  echo "<td>" . $cliente['id_cliente'] . "</td>";
                  echo "<td>" . $cliente['documento'] . "</td>";
                  echo "<td>" . $cliente['nombre'] . "</td>";
                  echo "<td>" . $cliente['telefono'] . "</td>";
                  echo "<td>" . ($cliente['estado'] == 1 ? "Activo" : "Inactivo") . "</td>";
                  echo "<td>";
                  echo "<a href='editar.php?id_cliente=" . $cliente['id_cliente'] . "' class='btn-action btn btn-outline-warning btn-sm me-2'><i class='fa-solid fa-pen-to-square'></i></a>";
                  echo "<a href='eliminar.php?id_cliente=" . $cliente['id_cliente'] . "' class='btn-action btn btn-outline-danger btn-sm'><i class='fa-solid fa-trash'></i></a>";
                  echo "</td>";
                  echo "</tr>";
                }
                // Cerrar la conexión a la base de datos
                $conexion = null;

                ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Sidebar toggle
      document.getElementById("menu-toggle").addEventListener("click", () => {
        document.getElementById("sidebar").classList.toggle("d-none");
      });
    </script>
  </body>
</html>
