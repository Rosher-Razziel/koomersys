<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Taretirocaja extends Migration
{
    public function up(){
         $this->forge->addField([
            'FIRETIROCAJAID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ],
            'FIUSUARIOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FDFECHARETIRO' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FDMONTORETIRO' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'FCMOTIVORETIRO' => [
                'type' => 'TEXT',
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIRETIROCAJAID', true);
        $this->forge->addForeignKey('FIUSUARIOID', 'TAUSUARIO', 'FIUSUARIOID');
        $this->forge->createTable('TARETIROCAJA');
    }

    public function down(){
        $this->forge->dropTable('TARETIROCAJA');
    }
}
