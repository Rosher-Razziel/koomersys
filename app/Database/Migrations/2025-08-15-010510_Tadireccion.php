<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tadireccion extends Migration
{
    public function up(){
         $this->forge->addField([
            'FIDIRECCIONID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FETIPOENTIDAD' => [
                'type' => 'ENUM',
                'constraint' => ['Cliente', 'Sucursal'],
                'null' => false
            ],
            'FISUCURSALID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FICLIENTEID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FCCALLE' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'FCNUMEROEXTERIOR' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false
            ],
            'FCNUMEROINTERIOR' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'FCCOLONIA' => [
                'type' => 'VARCHAR', 
                'constraint' => 50,
                'null' => false
            ],
            'FCCODIGOPOSTAL' => [
                'type' => 'CHAR', 
                'constraint' => 10,
                'null' => false
            ],
            'FCCIUDAD' => [
                'type' => 'VARCHAR', 
                'constraint' => 50,
                'null' => false
            ],
            'FCESTADO' => [
                'type' => 'VARCHAR', 
                'constraint' => 50,
                'null' => false
            ],
            'FCPAIS' => [
                'type' => 'VARCHAR', 
                'constraint' => 50,
                'null' => false
            ],
            'FCREFERENCIA' => [
                'type' => 'VARCHAR', 
                'constraint' => 100,
                'null' => false
            ],
            'FCESPRINCIPAL' => [
                'type' => 'TINYINT', 
                'default' => 0,
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIDIRECCIONID', true);
        $this->forge->addForeignKey('FICLIENTEID', 'TACLIENTE', 'FICLIENTEID');
        $this->forge->addForeignKey('FISUCURSALID', 'TASUCURSAL', 'FISUCURSALID');
        $this->forge->createTable('TADIRECCION');
    }

    public function down(){
        $this->forge->dropTable('TADIRECCION');
    }
}
