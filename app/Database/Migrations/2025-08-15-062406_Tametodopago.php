<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tametodopago extends Migration
{
    public function up(){
        $this->forge->addField([
            'FIMETODOPAGOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FCNOMBREPAGO' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
                'null' => false
            ],
            'FCDESCRIPCION' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIMETODOPAGOID', true);
        $this->forge->createTable('TAMETODOPAGO');
    }

    public function down(){
        $this->forge->dropTable('TAMETODOPAGO');
    }
}
