<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tamarca extends Migration
{
    public function up(){
         $this->forge->addField([
            'FIMARCAID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FCNOMBRE' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
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
            'FCIMAGEN' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => false
            ],
            'FIESTATUS' => [
                'type' => 'TINYINT', 
                'default' => 1,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIMARCAID', true);
        $this->forge->createTable('TAMARCA');
    }

    public function down(){
        $this->forge->dropTable('TAMARCA');
    }
}