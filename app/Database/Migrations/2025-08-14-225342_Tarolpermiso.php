<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tarolpermiso extends Migration
{
    public function up(){
         $this->forge->addField([
            'FIROLPERMISOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ],
            'FIROLID' => [
                'type' => 'INT',
               'constraint' => 11,
                'null' => false
            ],
            'FIPERMISOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIROLPERMISOID', true);
        $this->forge->addForeignKey('FIROLID', 'TAROL', 'FIROLID');
        $this->forge->addForeignKey('FIPERMISOID', 'TAPERMISO', 'FIPERMISOID');
        $this->forge->createTable('TAROLPERMISO');
    }

    public function down(){
        $this->forge->dropTable('TAROLPERMISO');
    }
}
