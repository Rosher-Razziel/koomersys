<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tasucursal extends Migration
{
    public function up(){
        $this->forge->addField([
        'FISUCURSALID' => [
          'type' => 'INT',
          'constraint' => 11,
          'auto_increment' => true,
          'null' => false
        ], 
        'FIMARCAID' => [
          'type' => 'INT',
          'constraint' => 11,
          'null' => false
        ],
        'FCNOMBRESUCURSAL' => [
          'type' => 'VARCHAR',
          'constraint' => 45,
          'null' => false
        ],
        'FDFECHAALTA' => [
          'type' => 'DATETIME',
          'null' => false
        ],
        'FDFECHAACTUALIZACION' => [
          'type' => 'DATETIME',
          'null' => false
        ],
        'FCIMAGENSUCURSAL' => [
          'type' => 'VARCHAR',
          'constraint' => 255,
          'null' => false
        ],
        'FIESTATUS' => [
          'type' => 'TINYINT',
          'constraint' => 1,
          'null' => false
        ]
      ]);

      $this->forge->addKey('FISUCURSALID', true);
      $this->forge->addForeignKey('FIMARCAID', 'TAMARCA', 'FIMARCAID');
      $this->forge->createTable('TASUCURSAL');
    }

    public function down(){
         $this->forge->dropTable('TASUCURSAL');
    }
}
