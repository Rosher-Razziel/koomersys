<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tadetalleventa extends Migration
{
    public function up(){
        $this->forge->addField([
            'FIDETALLEVENTAID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ], 
            'FIVENTAID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FIPRODUCTOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FDCANTIDAD' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'FDPRECIOUNITARIO' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'FDDESCUENTO' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'FDIMPUESTO' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'FDSUBTOTAL' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'FEESTATUS' => [
                'type' => 'ENUM',
                'constraint' => ['COMPLETADO', 'CANCELADO', 'PENDIENTE', 'DEVUELTO'],
                'null' => false
            ],
            'FDFECHAALTA' => [
                'type' => 'DATETIME',
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIDETALLEVENTAID', true);
        $this->forge->addForeignKey('FIVENTAID', 'TAVENTA', 'FIVENTAID');
        $this->forge->createTable('TADETALLEVENTA');
    }

    public function down(){
        $this->forge->dropTable('TADETALLEVENTA');
    }
}
