<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($router) ? 'Editar Router' : 'Agregar Router' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1><?= isset($router) ? 'Editar Router' : 'Agregar Router' ?></h1>

    <form action="<?= isset($router) ? '/routers/update/'.$router['Hostname'] : '/routers/store' ?>" method="post">
        <div class="form-group">
            <label for="hostname">Hostname</label>
            <input type="text" class="form-control" id="hostname" name="hostname" value="<?= isset($router) ? $router['Hostname'] : '' ?>" <?= isset($router) ? 'readonly' : '' ?> required>
        </div>
        <div class="form-group">
            <label for="ip">IP</label>
            <input type="text" class="form-control" id="ip" name="ip" value="<?= isset($router) ? $router['IP'] : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= isset($router) ? $router['Descripcion'] : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="metodo_acceso">Método de Acceso</label>
            <input type="text" class="form-control" id="metodo_acceso" name="metodo_acceso" value="<?= isset($router) ? $router['Metodo_de_acceso'] : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-success"><?= isset($router) ? 'Actualizar' : 'Agregar' ?></button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
