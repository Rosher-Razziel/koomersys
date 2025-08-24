<?php

namespace App\Controllers\Usuarios;

use App\Controllers\BaseController;
use App\Models\Users\UsuariosModel;
use App\Services\UserService;

class UsuariosController extends BaseController{
    protected $userService;
    protected $encrypter;

    public function __construct(){
        $this->userService = new UserService();
        $this->encrypter   = \Config\Services::encrypter();
    }

    public function index(){
        $usuariosModel = new UsuariosModel();
        if(session()->get('usuario.rol_id') == 1){
            $data['usuarios'] = $usuariosModel->getTodosUsuarios();
        }else{
            $data['usuarios'] = $usuariosModel->getTodosUsuariosMarca(session()->get('marca_id'));
        }
        return $this->render('users/index', $data);
    }

    public function agregar(){
        return $this->render('users/agregar');
    }

    public function edit(string $userID, string $marcaId){
        $userID = $this->decryptParams($userID);
        $marcaId = $this->decryptParams($marcaId);
        $data = $this->userService->getUserDataForEdit($userID, $marcaId);
        return $this->render('users/edit', $data);
    }

    private function decryptParams(string $encryptedId): int{
        return $this->encrypter->decrypt(hex2bin($encryptedId));
    }

    // public function update($userID){
    //     $usuariosModel = new UsuariosModel();
    //     $data = [
    //         'nombre' => $this->request->getPost('nombre'),
    //         'email' => $this->request->getPost('email'),
    //         'rol' => $this->request->getPost('rol'),
    //     ];
    //     $usuariosModel->update($this->request->getPost('id'), $data);
    //     return redirect()->to('/usuarios');
    // }
}
