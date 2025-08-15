<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaretirocajaSeeder extends Seeder
{
    public function run(){
        $data =[
            [
                'FIUSUARIOID' => 1,
                'FDFECHARETIRO' => '2025-08-14 14:54:34',
                'FDMONTORETIRO' => 320.00,
                'FCMOTIVORETIRO' => 'Retiro por compra de red cola en camion'
            ],[
                'FIUSUARIOID' => 1,
                'FDFECHARETIRO' => '2025-08-14 14:54:34',
                'FDMONTORETIRO' => 87.00,
                'FCMOTIVORETIRO' => 'Retiro por compra de cigarros en el neto'
            ],[
                'FIUSUARIOID' => 1,
                'FDFECHARETIRO' => '2025-08-14 14:54:34',
                'FDMONTORETIRO' => 100.00,
                'FCMOTIVORETIRO' => 'Retiro por compra de botanas'
            ],[
                'FIUSUARIOID' => 1,
                'FDFECHARETIRO' => '2025-08-14 14:54:34',
                'FDMONTORETIRO' => 145.00,
                'FCMOTIVORETIRO' => 'Retiro por compra de red cola de 600ml con cheo'
            ]
        ];

        $this->db->table('TARETIROCAJA')->insertBatch($data);
    }
}
