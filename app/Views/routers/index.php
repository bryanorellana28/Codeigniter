<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Routers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de Routers</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <a href="/routers/create" class="btn btn-primary mb-3">Agregar Router</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Hostname</th>
            <th>IP</th>
            <th>Descripción</th>
            <th>Método de acceso</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($routers as $router): ?>
            <tr>
                <td><?= $router['Hostname'] ?></td>
                <td><?= $router['IP'] ?></td>
                <td><?= $router['Descripcion'] ?></td>
                <td><?= $router['Metodo_de_acceso'] ?></td>
                <td>
                    <a href="/routers/edit/<?= $router['Hostname'] ?>" class="btn btn-warning">Editar</a>
                    <button class="btn btn-danger btn-delete" data-hostname="<?= $router['Hostname'] ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<script>
    $('.btn-delete').on('click', function() {
        const hostname = $(this).data('hostname');

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
                window.location.href = "/routers/delete/" + hostname;
            }
        })
    });
</script>
</body>
</html>
