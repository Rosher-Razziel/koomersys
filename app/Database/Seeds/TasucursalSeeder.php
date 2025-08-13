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
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FCNOMBRESUCURSAL' => 'Todo para su pan',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FCNOMBRESUCURSAL' => 'La esquinita',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FCNOMBRESUCURSAL' => 'Starbucks',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FCNOMBRESUCURSAL' => 'Alsea',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ]
        ];

        $this->db->table('TASUCURSAL')->insertBatch($data);
    }
}
