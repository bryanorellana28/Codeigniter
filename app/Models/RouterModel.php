<?php

namespace App\Models;

use CodeIgniter\Model;

class RouterModel extends Model
{
    protected $table      = 'routers';
    protected $primaryKey = 'Hostname';

    protected $allowedFields = ['Hostname', 'IP', 'Descripcion', 'Metodo_de_acceso'];

    // Configuración adicional si es necesario
}
