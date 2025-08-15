<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tarol extends Migration
{
    public function up(){
         $this->forge->addField([
            'FIROLID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ],
            'FCNOMBREROL' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'FCDETALLEROL' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIROLID', true);
        $this->forge->createTable('TAROL');
    }

    public function down(){
        $this->forge->dropTable('TAROL');
    }
}
