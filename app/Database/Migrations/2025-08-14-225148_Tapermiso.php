<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tapermiso extends Migration
{
    public function up(){
        $this->forge->addField([
            'FIPERMISOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ],
            'FCNOMBREPERMISO' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false
            ],
            'FCDETALLEPERMISO' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIPERMISOID', true);
        $this->forge->createTable('TAPERMISO');
    }

    public function down(){
        $this->forge->dropTable('TAPERMISO');
    }
}
