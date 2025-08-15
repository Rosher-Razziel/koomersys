<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tadetallemetodopago extends Migration
{
    public function up(){
         $this->forge->addField([
            'FIDETALLEMETODOPAGOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FIMETODOPAGOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FITRANSACCIONID' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'FDFECHAPAGO' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FEESTATUS' => [
                'type' => 'ENUM',
                'constraint' => ['ACEPTADO', 'CANCELADO', 'PROCESO'],
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIDETALLEMETODOPAGOID', true);
        $this->forge->addForeignKey('FIMETODOPAGOID', 'TAMETODOPAGO', 'FIMETODOPAGOID');
        $this->forge->createTable('TADETALLEMETODOPAGO');
    }

    public function down(){
        $this->forge->dropTable('TADETALLEMETODOPAGO');
    }
}
