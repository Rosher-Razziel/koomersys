<?php

namespace App\Models\Sucursales;

use CodeIgniter\Model;

class SucursalesModel extends Model
{
    protected $table            = 'TASUCURSAL';
    protected $primaryKey       = 'FISUCURSALID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['FIMARCAID', 'FCNOMBRESUCURSAL', 'FCIMAGENSUCURSAL', 'FIESTATUS'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'FDFECHAALTA';
    protected $updatedField  = 'FDFECHAACTUALIZACION';
    // protected $deletedField  = 'deleted_at';

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

     function obtenerSucursalesUser($marcaId){
        return $this->select("
            TASUCURSAL.FISUCURSALID,
            TASUCURSAL.FCNOMBRESUCURSAL")
            ->where('TASUCURSAL.FIMARCAID', $marcaId)
            ->findAll();
    }
}
