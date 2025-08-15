<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TatransferenciasucursalSeeder extends Seeder
{
    public function run(){
         $data =[
            [
                'FIORIGENSUCURSALID' => 1,
                'FIDESTINOSUCURSALID' => 2,
                'FIPRODUCTOID' => 1,
                'FICANTIDAD' => 10,
                'FDFECHATRANSFERENCIA' => '2025-07-11 15:28:10',
                'FEESTATUS' => 'Enviado'
            ],[
                'FIORIGENSUCURSALID' => 3,
                'FIDESTINOSUCURSALID' => 4,
                'FIPRODUCTOID' => 12,
                'FICANTIDAD' => 12,
                'FDFECHATRANSFERENCIA' => '2025-07-11 15:28:10',
                'FEESTATUS' => 'Recibido'
            ],[
                'FIORIGENSUCURSALID' => 5,
                'FIDESTINOSUCURSALID' => 1,
                'FIPRODUCTOID' => 1,
                'FICANTIDAD' => 10,
                'FDFECHATRANSFERENCIA' => '2025-07-11 15:28:10',
                'FEESTATUS' => 'Cancelado'
            ]
        ];

        $this->db->table('TATRANSFERENCIASUCURSAL')->insertBatch($data);
    }
}
