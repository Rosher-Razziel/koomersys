<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tacreditocliente extends Migration
{
    public function up(){
        $this->forge->addField([
            'FICREDITOCLIENTEID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FICLIENTEID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FDMONTOCREDITO' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'FDFECHAALTA' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FDFECHAACTUALIZACION' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FIESTATUS' => [
                'type' => 'TINYINT',
                'default' => 1,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FICREDITOCLIENTEID', true);
        $this->forge->addForeignKey('FICLIENTEID', 'TACLIENTE', 'FICLIENTEID');
        $this->forge->createTable('TACREDITOCLIENTE');
    }

    public function down(){
        $this->forge->dropTable('TACREDITOCLIENTE');
    }
}
