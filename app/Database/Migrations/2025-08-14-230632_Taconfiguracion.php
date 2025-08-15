<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Taconfiguracion extends Migration
{
    public function up(){
         $this->forge->addField([
            'FICONFIGURACIONID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FCCLAVE' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
                'null' => false
            ],
            'FCVALOR' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'FCDESCRIPCION' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false
            ],
            'FDFECHAACTUALIZACION' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'FISUCURSALID' => [
                'type' => 'INT', 
                'default' => 11,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FICONFIGURACIONID', true);
        $this->forge->addForeignKey('FISUCURSALID', 'TASUCURSAL', 'FISUCURSALID');
        $this->forge->createTable('TACONFIGURACION');
    }

    public function down(){
        $this->forge->dropTable('TACONFIGURACION');
    }
}
