<?php

namespace App\Models;

use CodeIgniter\Model;

class RouterModel extends Model
{
    protected $table      = 'routers';
    protected $primaryKey = 'Hostname';

    protected $allowedFields = ['Hostname', 'IP', 'Descripcion', 'Metodo_de_acceso'];

    protected $validationRules = [
        'hostname' => 'required|min_length[3]',
        'ip' => 'required|valid_ip',
        'metodo_acceso' => 'required',
    ];
}
