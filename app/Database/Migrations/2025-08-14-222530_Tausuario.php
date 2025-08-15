<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tausuario extends Migration
{
    public function up(){
         $this->forge->addField([
        'FIUSUARIOID' => [
          'type' => 'INT',
          'constraint' => 11,
          'auto_increment' => true,
          'null' => false
        ],
        'FCNOMBREUSUARIO' => [
          'type' => 'VARCHAR',
          'constraint' => 50,
          'null' => false
        ],
        'FCAPELLIDOPATERNO' => [
          'type' => 'VARCHAR',
          'constraint' => 50,
          'null' => false
        ],
        'FCAPELLIDOMATERNO' => [
          'type' => 'VARCHAR',
          'constraint' => 50,
          'null' => false
        ],
        'FCEMAIL' => [
          'type' => 'VARCHAR',
          'constraint' => 100,
          'unique' => true,
          'null' => false
        ],
        'FCCLAVE' => [
          'type' => 'VARCHAR',
          'constraint' => 255,
          'unique' => true,
          'null' => false
        ],
        'FIROLID' => [
          'type' => 'INT',
          'constraint' => 11,
          'null' => false
        ],
        'FISUCURSALID' => [
          'type' => 'INT',
          'constraint' => 11,
          'null' => false
        ],
        'FIESTATUS' => [
          'type' => 'TINYINT',
          'constraint' => 4,
          'null' => false,
          'default' => 0
        ],
        'FIEMAILVERIFICADO' => [
          'type' => 'TINYINT',
          'constraint' => 4,
          'null' => false,
          'default' => 0
        ],
        'FDFECHAALTA' => [
          'type' => 'DATETIME',
          'null' => true
        ],
        'FDFECHAACTUALIZACION' => [
          'type' => 'DATETIME',
          'null' => true
        ],
        'FCRECORDARTOKEN' => [
          'type' => 'VARCHAR',
          'constraint' => 64,
          'null' => true
        ],
        'FDRECORDARTOKENFIN' => [
          'type' => 'DATETIME',
          'null' => true
        ]
      ]);

      $this->forge->addKey('FIUSUARIOID', true);
      $this->forge->addForeignKey('FIROLID', 'TAROL', 'FIROLID');
      $this->forge->addForeignKey('FISUCURSALID', 'TASUCURSAL', 'FISUCURSALID');
      $this->forge->createTable('TAUSUARIO');
    }

    public function down(){
        $this->forge->dropTable('TAUSUARIO');
    }
}
