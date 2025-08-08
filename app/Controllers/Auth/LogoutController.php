<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;

class LogoutController extends BaseController
{
    public function index(): string {
        return view('auth/login');  
    }
}