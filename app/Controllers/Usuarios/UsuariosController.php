<?php

namespace App\Controllers\Usuarios;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ElementosmenuModel;
use App\Models\Users\UsuariosModel;

class UsuariosController extends BaseController
{
    public function index(){
        $menuModel = new ElementosmenuModel();
        $data['menu'] = $menuModel->obtenerMenuCompleto(session()->get('usuario.rol_id'));
        $usuariosModel = new UsuariosModel();
        $data['usuarios'] = $usuariosModel->getTodosUsuarios();
        return view('users/index', $data);
    }
}
