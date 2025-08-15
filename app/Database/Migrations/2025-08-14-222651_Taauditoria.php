<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Taauditoria extends Migration
{
    public function up(){
        $this->forge->addField([
            'FIAUDITORIAID' => [
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
            'FCDETALLEACCION' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'FCDESCRIPCION' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'FCUSUARIOIP' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => false
            ],
            'FCFECHAACCION' => [
                'type' => 'DATETIME',
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIAUDITORIAID', true);
        $this->forge->addForeignKey('FIUSUARIOID', 'TAUSUARIO', 'FIUSUARIOID');
        $this->forge->createTable('TAAUDITORIA');
    }

    public function down(){
        $this->forge->dropTable('TAAUDITORIA');
    }
}
