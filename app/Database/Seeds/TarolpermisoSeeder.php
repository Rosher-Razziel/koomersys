<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TarolpermisoSeeder extends Seeder
{
    public function run(){
         $data =[
            [
                'FIROLID' => 1,
                'FIPERMISOID' => 1
            ],
            [
                'FIROLID' => 1,
                'FIPERMISOID' => 2
            ],
            [
                'FIROLID' => 1,
                'FIPERMISOID' => 3
            ],
            [
                'FIROLID' => 2,
                'FIPERMISOID' => 1
            ],
            [
                'FIROLID' => 2,
                'FIPERMISOID' => 2
            ],
            [
                'FIROLID' => 2,
                'FIPERMISOID' => 3
            ],
            [
                'FIROLID' => 3,
                'FIPERMISOID' => 1
            ],
            [
                'FIROLID' => 3,
                'FIPERMISOID' => 2
            ],
            [
                'FIROLID' => 3,
                'FIPERMISOID' => 3
            ]
        ];

        $this->db->table('TAROLPERMISO')->insertBatch($data);
    }
}
