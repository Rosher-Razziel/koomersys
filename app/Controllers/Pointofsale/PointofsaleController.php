<?php

namespace App\Controllers\Pointofsale;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PointofsaleController extends BaseController {
    public function index(){
        return view('pointofsale/index');
    }
}
