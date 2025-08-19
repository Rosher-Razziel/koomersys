<?php

namespace App\Models;

use CodeIgniter\Model;

class ElementosmenuModel extends Model
{
    protected $table            = 'TAELEMENTOSMENU';
    protected $primaryKey       = 'FIELEMENTOMENUID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['FIELEMENOMENUID','FCTITULO', 'FCURL', 'FCINOCOMENU', 'FIROLID', 'FIELEMENTOMENUPADREID'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // TODO: FUNCION PARA OBTENER ELEMENTOS DEL MENU
    public function obtenerMenuCompleto($rolID){
        $elementos = $this->orderBy('FIELEMENTOMENUPADREID, FIELEMENOMENUID')->where('FIROLID', $rolID)->findAll();

        $menu = [];
        foreach ($elementos as $elemento) {
            $padreId = $elemento['FIELEMENTOMENUPADREID'] ?? 0;
            $menu[$padreId][] = $elemento;
        }   
        
        return $menu;
    }
}
