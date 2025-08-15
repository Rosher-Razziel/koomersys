<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tatipoperiodo extends Migration
{
    public function up(){
        $this->forge->addField([
            'FITIPOPERIODOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FCNOMBREPERIODO' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
                'null' => false
            ],
            'FIDURACIONPERIODO' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FIESTATUS' => [
                'type' => 'TINYINT',
                'default' => 1,
                'null' => false
            ],
            'FDFECHAINICIO' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FDFECHATERMINO' => [
                'type' => 'DATETIME',
                'null' => false
            ]
        ]);

        $this->forge->addKey('FITIPOPERIODOID', true);
        $this->forge->createTable('TATIPOPERIODO');
    }

    public function down(){
        $this->forge->dropTable('TATIPOPERIODO');
    }
}
