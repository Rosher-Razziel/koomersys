<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TacortecajaSeeder extends Seeder
{
    public function run(){
        $data =[
            [
                'FIUSUARIOID' => 1,
                'FDSALDOINICIAL' => 300,
                'FDTOTALEFECTIVO' => 1788.50,
                'FDTOTALTARJETA' => 143.00,
                'FDTOTALSPEI' => 120.00,
                'FDTOTALRETIRO' => 342.00,
                'FDTOTALGENERAL' => 2788.50,
                'FDFECHACORTE' => '2025-07-11 00:00:00'
            ],[
                'FIUSUARIOID' => 1,
                'FDSALDOINICIAL' => 300,
                'FDTOTALEFECTIVO' => 1788.50,
                'FDTOTALTARJETA' => 143.00,
                'FDTOTALSPEI' => 120.00,
                'FDTOTALRETIRO' => 342.00,
                'FDTOTALGENERAL' => 2788.50,
                'FDFECHACORTE' => '2025-07-12 00:00:00'
            ],[
                'FIUSUARIOID' => 1,
                'FDSALDOINICIAL' => 2788.50,
                'FDTOTALEFECTIVO' => 548.50,
                'FDTOTALTARJETA' => 13.00,
                'FDTOTALSPEI' => 110.00,
                'FDTOTALRETIRO' => 322.00,
                'FDTOTALGENERAL' => 268.50,
                'FDFECHACORTE' => '2025-07-13 00:00:00'
            ],[
                'FIUSUARIOID' => 1,
                'FDSALDOINICIAL' => 268.50,
                'FDTOTALEFECTIVO' => 548.50,
                'FDTOTALTARJETA' => 13.00,
                'FDTOTALSPEI' => 110.00,
                'FDTOTALRETIRO' => 322.00,
                'FDTOTALGENERAL' => 268.50,
                'FDFECHACORTE' => '2025-07-14 00:00:00'
            ]
        ];

        $this->db->table('TACORTECAJA')->insertBatch($data);
    }
}
