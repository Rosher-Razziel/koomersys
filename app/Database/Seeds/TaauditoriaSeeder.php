<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaauditoriaSeeder extends Seeder
{
    public function run(){
         $data =[
            [
                'FIUSUARIOID' => 1,
                'FCDETALLEACCION' => 'Inserción',
                'FCDESCRIPCION' => 'Se inserto una sucursal',
                'FCUSUARIOIP' => '127.0.0.1',
                'FCFECHAACCION' => '2025-07-11 00:00:00'
            ],[
                'FIUSUARIOID' => 1,
                'FCDETALLEACCION' => 'Actualización',
                'FCDESCRIPCION' => 'Se actualizo una sucursal',
                'FCUSUARIOIP' => '127.0.0.1',
                'FCFECHAACCION' => '2025-07-11 00:00:00'
            ],[
                'FIUSUARIOID' => 1,
                'FCDETALLEACCION' => 'Eliminación',
                'FCDESCRIPCION' => 'Se elimino una sucursal',
                'FCUSUARIOIP' => '127.0.0.1',
                'FCFECHAACCION' => '2025-07-11 00:00:00'
            ]
        ];

        $this->db->table('TAAUDITORIA')->insertBatch($data);
    }
}
