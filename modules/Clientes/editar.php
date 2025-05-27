<?php
include "../../components/conexion.php";
$id = $_GET['id'];
$stmt = $conexion->prepare("SELECT * FROM clientes WHERE id_cliente = :id");
$stmt->execute([':id' => $id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <title>Editar Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Editar Cliente</h2>
    <form action="actualizar.php" method="POST">
      <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">
      <div class="mb-3">
        <label for="documento" class="form-label">Documento</label>
        <input type="text" class="form-control" name="documento" value="<?= $cliente['documento'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?= $cliente['nombre'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="<?= $cliente['apellido'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" name="telefono" value="<?= $cliente['telefono'] ?>">
      </div>
      <div class="mb-3">
        <label for="correo" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" name="correo_electronico" value="<?= $cliente['correo_electronico'] ?>">
      </div>
      <div class="mb-3">
        <label for="direccion" class="form-label">Dirección</label>
        <input type="text" class="form-control" name="direccion" value="<?= $cliente['direccion'] ?>">
      </div>
      <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" name="estado">
          <option value="1" <?= $cliente['estado'] ? 'selected' : '' ?>>Activo</option>
          <option value="0" <?= !$cliente['estado'] ? 'selected' : '' ?>>Inactivo</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
      <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>