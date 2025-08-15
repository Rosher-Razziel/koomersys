<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tacliente extends Migration
{
    public function up(){
         $this->forge->addField([
            'FICLIENTEID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FCNOMBRECLIENTE' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
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
            'FCTIPOCLIENTE' => [
                'type' => 'ENUM',
                'constraint' => ['Frecuente', 'Regular', 'VIP', 'Mayorista'],
                'null' => true
            ],
            'FCEMAIL' => [
                'type' => 'VARCHAR', 
                'constraint' => 50,
                'null' => false
            ],
            'FCTELEFONO' => [
                'type' => 'CHAR', 
                'constraint' => 15,
                'null' => false
            ],
            'FIESTATUS' => [
                'type' => 'TINYINT', 
                'default' => 1,
                'null' => false
            ],
            'FDFECHAALTA' => [
                'type' => 'DATETIME', 
                'null' => false
            ],
            'FIEMAILVERIFICADO' => [
                'type' => 'TINYINT', 
                'default' => 0,
                'null' => false
            ],
            'FISUCURSALID' => [
                'type' => 'INT', 
                'default' => 11,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FICLIENTEID', true);
        $this->forge->createTable('TACLIENTE');
    }

    public function down(){
        $this->forge->dropTable('TACLIENTE');
    }
}
