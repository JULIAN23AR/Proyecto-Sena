<?php
#Incluimos la conexion a la base de datos
include "../../components/conexion.php";


#Consulta para traer el usuario a modificar
$id = $_GET['id_usuario'];
$SQL = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
$consulta = $conexion->prepare($SQL);
$consulta->bindParam(":id_usuario", $id);
$consulta->execute();
$usuario = $consulta->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
      rel="stylesheet" />
    <script
      src="https://kit.fontawesome.com/eeb2293ae5.js"
      crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="../../auth/Formulario_Editar/Estilos/Style.css" />
    <title>Editar Usuario</title>
  </head>
  <body>
    <div class="form-container">
      <form action="/PROYECTO_SENA/modules/users/update.php" method="POST">

          <input
            type="hidden"
            class="form-control"
            id="id_usuario"
            name="id_usuario"
            value="<?php echo $usuario['id_usuario']; ?>" />

        <div class="form-item">
          <label for="documento" class="form-label">Documento</label>
          <input
            type="text"
            class="form-control"
            id="documento"
            name="documento"
            required
            pattern="\d+"
            title="No se permiten signos especiales"
            value="<?php echo $usuario['documento']; ?>" />
        </div>

        <div class="form-item">
          <label for="nombre" class="form-label">Nombres</label>
          <input
            type="text"
            class="form-control"
            id="nombre"
            name="nombre"
            required
            value="<?php echo $usuario['nombre']; ?>" />
        </div>

        <div class="form-item">
          <label for="apellido" class="form-label">Apellidos</label>
          <input
            type="text"
            class="form-control"
            id="apellido"
            name="apellido"
            required
            value="<?php echo $usuario['apellido']; ?>" />
        </div>

        <div class="form-item">
          <label for="telefono" class="form-label">Teléfono</label>
          <input
            type="tel"
            class="form-control"
            id="telefono"
            name="telefono"
            pattern="[0-9]{10}"
            placeholder="Ej: 3111234567"
            value="<?php echo $usuario['telefono']; ?>" />
        </div>

        <div class="form-item">
          <label for="correo_electronico" class="form-label"
            >Correo Electrónico</label
          >
          <input
            type="email"
            class="form-control"
            id="correo_electronico"
            name="correo_electronico"
            required
            value="<?php echo $usuario['correo_electronico']; ?>" />
        </div>

        <div class="form-item">
          <label for="contrasena" class="form-label">Contraseña</label>
          <input
            type="password"
            class="form-control"
            id="contrasena"
            name="contrasena"
            required
            minlength="6"
            placeholder="Mínimo 6 caracteres"
            value="<?php echo $usuario['contrasena']; ?>" />
        </div>

        <div class="form-item">
          <label for="area" class="form-label">Área</label>
          <select
            id="area"
            name="area"
            class="form-control"
            aria-label="Selecciona el área del usuario">
            
            <option value="" disabled <?php if (empty($usuario['area'])) echo 'selected'; ?>>
              Seleccione su área
            </option>
            <option value="Administrador" <?php if ($usuario['area'] == 'Administrador') echo 'selected'; ?>>
              Administración
            </option>
            <option value="Empleado" <?php if ($usuario['area'] == 'Empleado') echo 'selected'; ?>>
              Tecnologías TIC
            </option>
            <option value="Cliente" <?php if ($usuario['area'] == 'Cliente') echo 'selected'; ?>>
              Ventas y Marketing
            </option>
            <option value="Proveedor" <?php if ($usuario['area'] == 'Proveedor') echo 'selected'; ?>>
              Finanzas
            </option>
            <option value="Contador" <?php if ($usuario['area'] == 'Contador') echo 'selected'; ?>>
              Recursos Humanos
            </option>
          </select>
        </div>

          <input
            type="hidden"
            class="form-control"
            id="fecha_creacion"
            name="fecha_registro"
            required
            value="<?php echo $usuario['fecha_registro']; ?>" />

        <div class="form-item">
          <label for="roles" class="form-label">Rol</label>
          <select
            id="roles"
            name="rol"
            class="form-control"
            aria-label="Selecciona el rol del usuario">
            
            <!-- <option value="" disabled <?php if (empty($usuario['rol'])) echo 'selected'; ?>>
              Seleccione un rol
            </option> -->
            <option value="Cliente" <?php if ($usuario['rol'] == 'Cliente') echo 'selected'; ?>>
              Cliente
            </option>
            <option value="Vendedor" <?php if ($usuario['rol'] == 'Vendedor') echo 'selected'; ?>>
              Vendedor
            </option>
            <option value="Empleado" <?php if ($usuario['rol'] == 'Empleado') echo 'selected'; ?>>
              Empleado
            </option>
            <option value="Admin" <?php if ($usuario['rol'] == 'Admin') echo 'selected'; ?>>
              Admin
            </option>
          </select>
        </div>


        <div class="form-item">
          <label for="estado">Estado:</label>
          <input
            list="estados"
            id="estado"
            name="estado"
            class="form-control"
            placeholder="ACTIVO / INACTIVO"
            required
            value="<?php echo $usuario['estado']; ?>" />
          <datalist id="estados">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
          </datalist>
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
          <a href="../../modules/users/index.php" class="btn btn-secondary"
            >Cancelar</a
          >
        </div>
      </form>
    </div>
  </body>
</html>
