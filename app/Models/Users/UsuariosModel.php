<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table            = 'TAUSUARIO';
    protected $primaryKey       = 'FIUSUARIOID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['FCNOMBREUSUARIO', 'FCAPELLIDOPATERNO', 'FCAPELLIDOMATERNO', 'FCEMAIL', 'FCCLAVE', 'FIROLID', 'FISUCURSALID', 'FCRECORDARTOKEN', 'FDRECORDARTOKENFIN'];

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
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Obtener todos los usuarios sin filtro
     */
    public function getTodosUsuarios(){
        return $this->select("
                    TAUSUARIO.FIUSUARIOID,
                    TAUSUARIO.FCNOMBREUSUARIO,
                    TAUSUARIO.FCAPELLIDOPATERNO,
                    TAUSUARIO.FCAPELLIDOMATERNO,
                    TAUSUARIO.FCEMAIL,
                    TAROL.FIROLID,
                    TAROL.FCNOMBREROL,
                    TASUCURSAL.FCNOMBRESUCURSAL,
                    TAUSUARIO.FIESTATUS,
                    TAMARCA.FIMARCAID,
                    TAMARCA.FCNOMBRE")
                    ->join('TAROL', 'TAROL.FIROLID = TAUSUARIO.FIROLID', 'LEFT')
                    ->join('TASUCURSAL', 'TASUCURSAL.FISUCURSALID = TAUSUARIO.FISUCURSALID', 'LEFT')
                    ->join('TAMARCA', 'TAMARCA.FIMARCAID = TASUCURSAL.FIMARCAID', 'LEFT')
                    ->findAll();
    }
    /**
     * Obtener todos los usuarios sin filtro
     */
    public function getTodosUsuariosMarca($marcaId = null){
        return $this->select("
                    TAUSUARIO.FIUSUARIOID,
                    TAUSUARIO.FCNOMBREUSUARIO,
                    TAUSUARIO.FCAPELLIDOPATERNO,
                    TAUSUARIO.FCAPELLIDOMATERNO,
                    TAUSUARIO.FCEMAIL,
                    TAROL.FIROLID,
                    TAROL.FCNOMBREROL,
                    TASUCURSAL.FCNOMBRESUCURSAL,
                    TAUSUARIO.FIESTATUS,
                    TAMARCA.FIMARCAID,
                    TAMARCA.FCNOMBRE")
                    ->join('TAROL', 'TAROL.FIROLID = TAUSUARIO.FIROLID', 'LEFT')
                    ->join('TASUCURSAL', 'TASUCURSAL.FISUCURSALID = TAUSUARIO.FISUCURSALID', 'LEFT')
                    ->join('TAMARCA', 'TAMARCA.FIMARCAID = TASUCURSAL.FIMARCAID', 'LEFT')
                    ->where('TAMARCA.FIMARCAID', $marcaId)
                    ->findAll();
    }
    /**
     * Obtener todos los usuarios clasificados por estatus
     */
    public function getUsuariosPorEstatus($estatus){
        return $this->select("
                    TAUSUARIO.FIUSUARIOID,
                    TAUSUARIO.FCNOMBREUSUARIO,
                    TAUSUARIO.FCAPELLIDOPATERNO,
                    TAUSUARIO.FCAPELLIDOMATERNO,
                    TAUSUARIO.FCEMAIL,
                    TAROL.FIROLID,
                    TAROL.FCNOMBREROL,
                    TASUCURSAL.FCNOMBRESUCURSAL,
                    TAUSUARIO.FIESTATUS")
                    ->join('TAROL', 'TAROL.FIROLID = TAUSUARIO.FIROLID', 'LEFT')
                    ->join('TASUCURSAL', 'TASUCURSAL.FISUCURSALID = TAUSUARIO.FISUCURSALID', 'LEFT')
                    ->where('TAUSUARIO.FIESTATUS', $estatus)
                    ->findAll();
    }
    /**
     * Obtener todos los usuarios clasificados por estatus
     */
    public function getUsuarioPorId($userId){
        return $this->select("
            TAUSUARIO.FIUSUARIOID,
            TAUSUARIO.FCNOMBREUSUARIO,
            TAUSUARIO.FCAPELLIDOPATERNO,
            TAUSUARIO.FCAPELLIDOMATERNO,
            TAUSUARIO.FCEMAIL,
            TAROL.FIROLID,
            TAROL.FCNOMBREROL,
            TASUCURSAL.FISUCURSALID,
            TASUCURSAL.FCNOMBRESUCURSAL,
            TAMARCA.FIMARCAID,
            TAUSUARIO.FIESTATUS,
            TAUSUARIO.FIEMAILVERIFICADO,
            TAUSUARIO.FDFECHAALTA,
            TAUSUARIO.FDFECHAACTUALIZACION")
        ->join('TAROL', 'TAROL.FIROLID = TAUSUARIO.FIROLID', 'LEFT')
        ->join('TASUCURSAL', 'TASUCURSAL.FISUCURSALID = TAUSUARIO.FISUCURSALID', 'LEFT')
        ->join('TAMARCA', 'TAMARCA.FIMARCAID = TASUCURSAL.FIMARCAID', 'LEFT')
        ->where('TAUSUARIO.FIUSUARIOID', $userId)
        ->asArray()
        ->first();
    }
}