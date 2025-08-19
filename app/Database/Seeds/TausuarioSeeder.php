<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TausuarioSeeder extends Seeder
{
    public function run()
    {
        $data =[
            [
                'FCNOMBREUSUARIO' => 'Rogelio',
                'FCAPELLIDOPATERNO' => 'Espinosa',
                'FCAPELLIDOMATERNO' => 'Reyes',
                'FCEMAIL' => 'respinosa@koomersys.com',
                'FCCLAVE' => '$2y$10$XKbmag11EnmfwV3nq2e6eukIQF.atG0Hj6gvSOkfpDI4nOHmeVpea',
                'FIROLID' => 1,
                'FISUCURSALID' => 21,
                'FIESTATUS' => 1,
                'FIEMAILVERIFICADO' => 1,
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCRECORDARTOKEN' => null,
                'FDRECORDARTOKENFIN' => null
            ],
            [
                'FCNOMBREUSUARIO' => 'Paulina Mayte',
                'FCAPELLIDOPATERNO' => 'Sanchez',
                'FCAPELLIDOMATERNO' => 'Vega',
                'FCEMAIL' => 'pmsanchez@koomersys.com',
                'FCCLAVE' => '$2y$10$hcs863LVbkVYXoX375gZjuyo5i8FZaw5KtK6GONR1HyjQ4X9LjdMm',
                'FIROLID' => 1,
                'FISUCURSALID' => 22,
                'FIESTATUS' => 1,
                'FIEMAILVERIFICADO' => 1,
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCRECORDARTOKEN' => null,
                'FDRECORDARTOKENFIN' => null
            ],
            [
                'FCNOMBREUSUARIO' => 'Adela',
                'FCAPELLIDOPATERNO' => 'Reyes',
                'FCAPELLIDOMATERNO' => 'Olvera',
                'FCEMAIL' => 'areyes@koomersys.com',
                'FCCLAVE' => '$2y$10$U9oMEGg.vZqMbFBMXkcN5uzfCW3Dr1vI2AmjLmas5YscnRPKnbuPy',
                'FIROLID' => 1,
                'FISUCURSALID' => 23,
                'FIESTATUS' => 1,
                'FIEMAILVERIFICADO' => 1,
                'FDFECHAALTA' => '2025-07-11 00:00:00',
                'FDFECHAACTUALIZACION' => '2025-07-11 00:00:00',
                'FCRECORDARTOKEN' => null,
                'FDRECORDARTOKENFIN' => null
            ]
        ];

        $this->db->table('TAUSUARIO')->insertBatch($data);
    }
}
