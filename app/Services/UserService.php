<?php

namespace App\Services;

use App\Models\Users\UsuariosModel;
use App\Models\Rol\RolesModel;
use App\Models\Sucursales\SucursalesModel;
use App\Models\Marcas\MarcasModel;

class UserService
{
    protected $usuariosModel;
    protected $rolesModel;
    protected $sucursalModel;
    protected $marcasModel;

    public function __construct(){
        $this->usuariosModel = new UsuariosModel();
        $this->rolesModel = new RolesModel();
        $this->sucursalModel = new SucursalesModel();
        $this->marcasModel = new MarcasModel();
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

    public function getUserDataForCreate(): array{
        return [
            'marcas'     => $this->marcasModel->obtenerMarcas(),
            'roles'      => $this->rolesModel->obtenerRolUser(),
            'sucursales' => $this->sucursalModel->obtenerSucursales(),
        ];
    }
}
