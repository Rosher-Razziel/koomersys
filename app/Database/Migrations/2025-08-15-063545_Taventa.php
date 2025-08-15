<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Taventa extends Migration
{
    public function up(){
        $this->forge->addField([
            'FIVENTAID' => [
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
            'FICLIENTEID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FIMETODOPAGOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FISUCURSALID' => [
                'type' => 'INT',
                'constraint' => 11,
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
            'FDTOTAL' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'FEESTATUS' => [
                'type' => 'ENUM',
                'constraint' => ['COMPLETADO', 'CANCELADO', 'DEVUELTO'],
                'null' => false
            ],
            'FDFECHAVENTA' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FDFECHAACTUALIZACION' => [
                'type' => 'DATETIME',
                'null' => false
            ]
        ]);

        $this->forge->addKey('FIVENTAID', true);
        $this->forge->addForeignKey('FICLIENTEID', 'TACLIENTE', 'FICLIENTEID');
        $this->forge->addForeignKey('FIMETODOPAGOID', 'TAMETODOPAGO', 'FIMETODOPAGOID');
        $this->forge->createTable('TAVENTA');
    }

    public function down(){
        $this->forge->dropTable('TAVENTA');
    }
}
