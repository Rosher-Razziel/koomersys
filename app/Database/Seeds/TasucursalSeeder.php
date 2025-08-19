<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TasucursalSeeder extends Seeder
{
    public function run()
    {
        $data =[
            [
                'FIMARCAID' => 1,
                'FCNOMBRESUCURSAL' => 'LA VENTANITA ESPINOSA - CONGRESO',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FIMARCAID' => 2,
                'FCNOMBRESUCURSAL' => 'TODO PARA SU PAN - GUADIANA',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FIMARCAID' => 3,
                'FCNOMBRESUCURSAL' => 'LA ESQUINITA - CONGRESO',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FIMARCAID' => 4,
                'FCNOMBRESUCURSAL' => 'STARBUCKS - PATIO BOTURINI',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ],
            [
                'FIMARCAID' => 4,
                'FCNOMBRESUCURSAL' => 'STARBUCKS - BARRANCA EL MUERTO',
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCIMAGENSUCURSAL' => 'http://www.winrohs.com/img/logo.png',
                'FIESTATUS' => 1
            ]
        ];

        $this->db->table('TASUCURSAL')->insertBatch($data);
    }
}
