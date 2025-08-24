<?php

namespace App\Services;

use App\Models\Users\UsuariosModel;
use App\Models\Rol\RolesModel;
use App\Models\Sucursales\SucursalesModel;

class UserService
{
    protected $usuariosModel;
    protected $rolesModel;
    protected $sucursalModel;

    public function __construct(){
        $this->usuariosModel = new UsuariosModel();
        $this->rolesModel = new RolesModel();
        $this->sucursalModel = new SucursalesModel();
    }

    /**
     * Retorna los datos necesarios para la vista de edición de un usuario
     */
    public function getUserDataForEdit(int $userId, int $marcaId): array{
        return [
            'usuario'    => $this->usuariosModel->getUsuarioPorId($userId),
            'roles'      => $this->rolesModel->obtenerRolUser(),
            'sucursales' => $this->sucursalModel->obtenerSucursalesUser($marcaId),
        ];
    }
}
