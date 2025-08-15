<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tadetallecredito extends Migration
{
    public function up(){
        $this->forge->addField([
            'FIDETALLECREDITOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FICREDITOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FITIPOPERIODOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FEESTATUS' => [
                'type' => 'ENUM',
                'constraint' => ['LIQUIDADO', 'PENDIENTE', 'DEMORADO'],
                'default' => 'PENDIENTE',
                'null' => false
            ],
            'FDFECHAPAGO' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FDFECHATERMINO' => [
                'type' => 'DATETIME',
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIDETALLECREDITOID', true);
        $this->forge->addForeignKey('FICREDITOID', 'TACREDITOCLIENTE', 'FICREDITOCLIENTEID');
        $this->forge->addForeignKey('FITIPOPERIODOID', 'TATIPOPERIODO', 'FITIPOPERIODOID');
        $this->forge->createTable('TADETALLECREDITO');
    }

    public function down(){
        $this->forge->dropTable('TADETALLECREDITO');
    }
}
