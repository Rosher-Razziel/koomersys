<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TamarcaSeeder extends Seeder
{
    public function run(){
        $data =[
            [
                'FCNOMBRE' => 'KOOMERSYS',
                'FDFECHAALTA' => '2025-01-01 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-01-01 00:00:00',
                'FCIMAGEN' => 'https://koomersys.com/koomersys.png',
                'FIESTATUS' => 1
            ], [
                'FCNOMBRE' => 'STARBUCKS',
                'FDFECHAALTA' => '2025-01-01 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-01-01 00:00:00',
                'FCIMAGEN' => 'https://koomersys.com/starbucks.png',
                'FIESTATUS' => 1
            ], [
                'FCNOMBRE' => 'TODO PARA SU PAN',
                'FDFECHAALTA' => '2025-01-01 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-01-01 00:00:00',
                'FCIMAGEN' => 'https://koomersys.com/pepsi.png',
                'FIESTATUS' => 1
            ], [
                'FCNOMBRE' => 'LA VENTANITA ESPINOSA',
                'FDFECHAALTA' => '2025-01-01 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-01-01 00:00:00',
                'FCIMAGEN' => 'https://koomersys.com/cocacola.png',
                'FIESTATUS' => 1
            ]
        ];

        $this->db->table('TAMARCA')->insertBatch($data);
    }
}
