<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TapermisoSeeder extends Seeder
{
    public function run(){
         $data =[
            [
                'FCNOMBREPERMISO' => 'Administrador',
                'FCDETALLEPERMISO' => 'Puede realizar todas las operaciones'
            ],
            [
                'FCNOMBREPERMISO' => 'Cajero',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones de caja'
            ],
            [
                'FCNOMBREPERMISO' => 'Auditor',
                'FCDETALLEPERMISO' => 'Puede realizar auditoría contable'
            ],
            [
                'FCNOMBREPERMISO' => 'Usuario',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones básicas'
            ],
            [
                'FCNOMBREPERMISO' => 'Proveedor',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con proveedores'
            ],
            [
                'FCNOMBREPERMISO' => 'Cliente',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con clientes'
            ],
            [
                'FCNOMBREPERMISO' => 'Producto',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con productos'
            ],
            [
                'FCNOMBREPERMISO' => 'Factura',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con facturas'
            ],
            [
                'FCNOMBREPERMISO' => 'Reportes',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con reportes'
            ],
            [
                'FCNOMBREPERMISO' => 'Configuración',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con configuración'
            ],
            [
                'FCNOMBREPERMISO' => 'Sucursal',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con sucursales'
            ],
            [
                'FCNOMBREPERMISO' => 'Usuario',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con usuarios'
            ],
            [
                'FCNOMBREPERMISO' => 'Permiso',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con permisos'
            ],
            [
                'FCNOMBREPERMISO' => 'Rol',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con roles'
            ],
            [
                'FCNOMBREPERMISO' => 'Sucursal',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con sucursales'
            ],
            [
                'FCNOMBREPERMISO' => 'Usuario',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con usuarios'
            ],
            [
                'FCNOMBREPERMISO' => 'Permiso',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con permisos'
            ],
            [
                'FCNOMBREPERMISO' => 'Rol',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con roles'
            ],
            [
                'FCNOMBREPERMISO' => 'Sucursal',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con sucursales'
            ],
            [
                'FCNOMBREPERMISO' => 'Usuario',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con usuarios'
            ],
            [
                'FCNOMBREPERMISO' => 'Permiso',
                'FCDETALLEPERMISO' => 'Puede realizar operaciones con permisos'
            ]
        ];

        $this->db->table('TAPERMISO')->insertBatch($data);
    }
}
