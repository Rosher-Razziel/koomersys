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
        $remember = $request->getPost('RememberPassword');

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel
            ->select('TAUSUARIO.*, TAROL.FCNOMBREROL, TASUCURSAL.FCNOMBRESUCURSAL, TAMARCA.FIMARCAID')
            ->join('TAROL', 'TAROL.FIROLID = TAUSUARIO.FIROLID')
            ->join('TASUCURSAL', 'TASUCURSAL.FISUCURSALID = TAUSUARIO.FISUCURSALID')
            ->join('TAMARCA', 'TAMARCA.FIMARCAID = TASUCURSAL.FIMARCAID', 'LEFT')
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
            'marca_id' => $usuario['FIMARCAID'],
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

        if ($remember) {
            $token = bin2hex(random_bytes(32)); // Token seguro
            $expire = time() + (15 * 60 * 60); // 15 horas

            // Guardar cookie
            setcookie('remember_token', $token, $expire, "/", "", false, true);

            // Guardar token en DB
            $usuarioModel->update($usuario['FIUSUARIOID'], [
                'FCRECORDARTOKEN' => $token,
                'FDRECORDARTOKENFIN' => date('Y-m-d H:i:s', $expire)
            ]);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Login exitoso', 'remember' => $remember]);
    }

    public function logout(){
        // Eliminar cookie
        setcookie('remember_token', '', time() - 3600, "/", "", false, true);

        // Limpiar DB
        if (session()->get('usuario.id')) {
            $usuarioModel = new UsuarioModel();
            $usuarioModel->update(session()->get('usuario.id'), [
                'FCRECORDARTOKEN' => null,
                'FDRECORDARTOKENFIN' => null
            ]);
        }
        session()->destroy();
        return redirect()->to(base_url());
    }

    public function accesodenegado(){
        return view('errors/accesodenegado');
    }
}