<?php

namespace App\Controllers\Products;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProductsController extends BaseController
{
    public function index(){
        return view('products/index');
    }
}
