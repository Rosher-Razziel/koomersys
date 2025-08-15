<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tapuntoscliente extends Migration
{
    public function up(){
        $this->forge->addField([
            'FIPUNTOSCLIENTEID' => [
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
            'FIPUNTOSACUMULADOS' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FIPUNTOSUTILIZADOS' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FIPUNTOSEXPIRADOS' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FDFECHAEXPLIRACION' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FISUCURSALID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIPUNTOSCLIENTEID', true);
        $this->forge->addForeignKey('FICLIENTEID', 'TACLIENTE', 'FICLIENTEID');
        $this->forge->createTable('TAPUNTOSCLIENTE');
    }

    public function down(){
        $this->forge->dropTable('TAPUNTOSCLIENTE');
    }
}
