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
            'hostname' => $this->request->getPost('hostname'),
            'ip' => $this->request->getPost('ip'),
            'descripcion' => $this->request->getPost('descripcion'),
            'metodo_acceso' => $this->request->getPost('metodo_acceso'),
        ];

        if ($model->insert($data)) {
            return redirect()->to('/routers')->with('success', 'Router agregado con éxito');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al agregar el router');
        }
    }

    public function edit($id)
    {
        $model = new RouterModel();
        $data['router'] = $model->find($id);

        return view('routers/edit', $data);
    }

    public function update($id)
    {
        $model = new RouterModel();

        $data = [
            'hostname' => $this->request->getPost('hostname'),
            'ip' => $this->request->getPost('ip'),
            'descripcion' => $this->request->getPost('descripcion'),
            'metodo_acceso' => $this->request->getPost('metodo_acceso'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('/routers')->with('success', 'Router actualizado con éxito');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar el router');
        }
    }

    public function delete($id)
    {
        $model = new RouterModel();

        if ($model->delete($id)) {
            return redirect()->to('/routers')->with('success', 'Router eliminado con éxito');
        } else {
            return redirect()->back()->with('error', 'Error al eliminar el router');
        }
    }
}
