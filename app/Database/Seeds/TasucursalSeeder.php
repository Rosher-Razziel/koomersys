<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TasucursalSeeder extends Seeder
{
    public function run()
    {
        $data =[
            [
                'FCNOMBRESUCURSAL' => 'La ventanita espinosa',
                'FIMARCAID' => 1,
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FCNOMBRESUCURSAL' => 'Todo para su pan',
                'FIMARCAID' => 2,
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FCNOMBRESUCURSAL' => 'La esquinita',
                'FIMARCAID' => 3,
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FCNOMBRESUCURSAL' => 'Starbucks',
                'FIMARCAID' => 4,
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FCNOMBRESUCURSAL' => 'Alsea',
                'FIMARCAID' => 5,
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ]
        ];

        $this->db->table('TASUCURSAL')->insertBatch($data);
    }
}
