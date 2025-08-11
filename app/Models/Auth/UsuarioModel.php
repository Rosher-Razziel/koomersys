<?php

namespace App\Models\Auth;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'TAUSUARIO';
    protected $primaryKey       = 'FIUSUARIOID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['FCNOMBREUSUARIO', 'FCAPELLIDOPATERNO', 'FCAPELLIDOMATERNO', 'FCEMAIL', 'FCCLAVE', 'FIROLID', 'FISUCURSALID'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'FDFECHAALTA';
    protected $updatedField  = 'FDFECHAACTUALIZACION';

    // Validation
    protected $validationRules      = [
        'FCEMAIL' => 'required|valid_email|is_unique[TAUSUARIO.FCEMAIL]',
        'FCCLAVE' => 'required|min_length[8]'
    ];
    protected $validationMessages   = [
        'FCEMAIL' => [
        'is_unique' => 'Este correo ya está registrado'
        ]
    ];

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // FUCNIONES
    protected function hashPassword(array $data) {
        if (isset($data['data']['FCCLAVE'])) {
            $data['data']['FCCLAVE'] = password_hash($data['data']['FCCLAVE'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
