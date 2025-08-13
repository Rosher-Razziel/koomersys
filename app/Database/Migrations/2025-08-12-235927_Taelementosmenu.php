<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Taelementosmenu extends Migration
{
    public function up(){
        $this->forge->addField([
            'FIELEMENOMENUID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ],
            'FCTITULO' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'FCURL' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
                'null' => true
            ],
            'FCINOCOMENU' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'FIPERMISOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FIELEMENTOMENUPADREID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ]
        ]);

        $this->forge->addKey('FIELEMENOMENUID', true);
        $this->forge->addForeignKey('FIPERMISOID', 'TAPERMISO', 'FIPERMISOID');
        $this->forge->addForeignKey('FIELEMENTOMENUPADREID', 'TAELEMENTOSMENU', 'FIELEMENOMENUID');
        $this->forge->createTable('TAELEMENTOSMENU');
    }

    public function down(){
         $this->forge->dropTable('TAELEMENTOSMENU');
    }
}
