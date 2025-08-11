<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\Auth\UsuarioModel;

class LoginController extends BaseController
{
    public function index(){
        return view('auth/login'); // 🔹 Devuelve la vista de login
    }

    public function login(){
        $request = service('request');

        $email = $request->getPost('signin-email');
        $password = $request->getPost('signin-password');

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel
            ->select('TAUSUARIO.*, TAROL.FCNOMBREROL, TASUCURSAL.FCNOMBRESUCURSAL')
            ->join('TAROL', 'TAROL.FIROLID = TAUSUARIO.FIROLID')
            ->join('TASUCURSAL', 'TASUCURSAL.FISUCURSALID = TAUSUARIO.FISUCURSALID')
            ->where('FCEMAIL', $email)
            ->first();

        if (!$usuario) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Usuario no encontrado']);
        }

        if (!password_verify($password, $usuario['FCCLAVE'])) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Contraseña incorrecta']);
        }

        // Guardar en sesión
        session()->set([
            'isLoggedIn' => true,
            'usuario' => [
                'id' => $usuario['FIUSUARIOID'],
                'nombre' => $usuario['FCNOMBREUSUARIO'],
                'apellido' => $usuario['FCAPELLIDOPATERNO'],
                'email' => $usuario['FCEMAIL'],
                'rol' => $usuario['FCNOMBREROL'],
                'rol_id' => $usuario['FIROLID'],
                'sucursal' => $usuario['FCNOMBRESUCURSAL']
            ]
        ]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Login exitoso']);
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }
}