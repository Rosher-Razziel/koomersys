<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TarolSeeder extends Seeder
{
    public function run()
    {
        $data =[
            [
                'FCNOMBREROL' => 'Administrador General',
                'FCDETALLEROL' => 'Puede acceder a todas las funciones del sistema'
            ],
            [
                'FCNOMBREROL' => 'Gerente de Tienda',
                'FCDETALLEROL' => 'Puede gestionar los inventarios, abastecimientos y ventas de la tienda'
            ],
            [
                'FCNOMBREROL' => 'Encargado de Inventario',
                'FCDETALLEROL' => 'Puede gestionar los inventarios de la tienda'
            ],
            [
                'FCNOMBREROL' => 'Encargado de Abastecimiento',
                'FCDETALLEROL' => 'Puede gestionar los abastecimientos de la tienda'
            ],
            [
                'FCNOMBREROL' => 'Repartidor / Logística',
                'FCDETALLEROL' => 'Puede gestionar la logística de la tienda'
            ],
            [
                'FCNOMBREROL' => 'Atención al Cliente',
                'FCDETALLEROL' => 'Puede atender a los clientes y gestionar sus pedidos'
            ],
            [
                'FCNOMBREROL' => 'Soporte Técnico / TI',
                'FCDETALLEROL' => 'Puede resolver problemas técnicos y realizar mantenimiento'
            ],
            [
                'FCNOMBREROL' => 'Contador',
                'FCDETALLEROL' => 'Puede realizar contabilidad y facturación'
            ],
            [
                'FCNOMBREROL' => 'Auditor',
                'FCDETALLEROL' => 'Puede realizar auditoría contable'
            ],
            [
                'FCNOMBREROL' => 'Cajero',
                'FCDETALLEROL' => 'Puede realizar operaciones de caja'
            ]
        ];

        $this->db->table('TAROL')->insertBatch($data);
    }
}
