<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Router</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Router</h2>
    
    <form action="<?= site_url('routers/update/'.$router['id']) ?>" method="post">
        <div class="mb-3">
            <label for="hostname" class="form-label">Hostname</label>
            <input type="text" class="form-control" id="hostname" name="hostname" value="<?= $router['hostname'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="ip" class="form-label">IP</label>
            <input type="text" class="form-control" id="ip" name="ip" value="<?= $router['ip'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $router['descripcion'] ?>">
        </div>
        <div class="mb-3">
            <label for="metodo_acceso" class="form-label">Método de Acceso</label>
            <input type="text" class="form-control" id="metodo_acceso" name="metodo_acceso" value="<?= $router['metodo_acceso'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= site_url('routers') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
