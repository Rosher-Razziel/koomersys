<?php

namespace App\Controllers\Dashboard;
use App\Controllers\BaseController;
use App\Models\ElementosmenuModel;

use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index(){
        $menuModel = new ElementosmenuModel();
        $data['menu'] = $menuModel->obtenerMenuCompleto(session()->get('usuario.rol_id'));
        return view('dashboard/index', $data); 
    }
}
