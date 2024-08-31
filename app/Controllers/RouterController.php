<?php

namespace App\Controllers;

use App\Models\RouterModel;
use CodeIgniter\Controller;

class RouterController extends Controller
{
    public function index()
    {
        $model = new RouterModel();
        $data['routers'] = $model->findAll();

        return view('routers/index', $data);
    }

    public function create()
    {
        return view('routers/create');
    }

    public function store()
    {
        $model = new RouterModel();

        $data = [
            'Hostname'       => $this->request->getPost('hostname'),
            'IP'             => $this->request->getPost('ip'),
            'Descripcion'    => $this->request->getPost('descripcion'),
            'Metodo_de_acceso' => $this->request->getPost('metodo_acceso')
        ];

        $model->insert($data);

        return redirect()->to('/routers')->with('success', 'Router agregado exitosamente.');
    }

    public function edit($hostname)
    {
        $model = new RouterModel();
        $data['router'] = $model->find($hostname);

        return view('routers/edit', $data);
    }

    public function update($hostname)
    {
        $model = new RouterModel();

        $data = [
            'IP'             => $this->request->getPost('ip'),
            'Descripcion'    => $this->request->getPost('descripcion'),
            'Metodo_de_acceso' => $this->request->getPost('metodo_acceso')
        ];

        $model->update($hostname, $data);

        return redirect()->to('/routers')->with('success', 'Router actualizado exitosamente.');
    }

    public function delete($hostname)
    {
        $model = new RouterModel();
        $model->delete($hostname);

        return redirect()->to('/routers')->with('success', 'Router eliminado exitosamente.');
    }
}
