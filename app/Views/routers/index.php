<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Routers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Inventario de Routers</h2>
    
    <a href="<?= site_url('routers/create') ?>" class="btn btn-success mb-3">Agregar Router</a>

    <?php if(session()->getFlashdata('success')): ?>
        <script>
            Swal.fire(
                '¡Éxito!',
                '<?= session()->getFlashdata('success') ?>',
                'success'
            )
        </script>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <script>
            Swal.fire(
                'Error',
                '<?= session()->getFlashdata('error') ?>',
                'error'
            )
        </script>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hostname</th>
                <th>IP</th>
                <th>Descripción</th>
                <th>Método de Acceso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($routers as $router): ?>
            <tr>
                <td><?= $router['hostname'] ?></td>
                <td><?= $router['ip'] ?></td>
                <td><?= $router['descripcion'] ?></td>
                <td><?= $router['metodo_acceso'] ?></td>
                <td>
                    <a href="<?= site_url('routers/edit/'.$router['id']) ?>" class="btn btn-primary">Editar</a>
                    <a href="javascript:void(0);" class="btn btn-danger" onclick="confirmDelete(<?= $router['id'] ?>)">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= site_url('routers/delete/') ?>' + id;
            }
        })
    }
</script>
</body>
</html>
