<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tatransferenciasucursal extends Migration
{
    public function up(){
        $this->forge->addField([
            'FITRANSFERENCIASUCURSALID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'null' => false
            ],
            'FIORIGENSUCURSALID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FIDESTINOSUCURSALID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FIPRODUCTOID' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FICANTIDAD' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
            'FDFECHATRANSFERENCIA' => [
                'type' => 'DATETIME',
                'null' => false
            ],
            'FEESTATUS' => [
                'type' => 'ENUM',
                'constraint' => ['Enviado', 'Recibido', 'Cancelado'],
                'null' => false
            ]   
        ]);

        $this->forge->addKey('FITRANSFERENCIASUCURSALID', true);
        $this->forge->addForeignKey('FIORIGENSUCURSALID', 'TASUCURSAL', 'FISUCURSALID');
        $this->forge->addForeignKey('FIDESTINOSUCURSALID', 'TASUCURSAL', 'FISUCURSALID');
        $this->forge->createTable('TATRANSFERENCIASUCURSAL');
    }

    public function down(){
        $this->forge->dropTable('TATRANSFERENCIASUCURSAL');
    }
}
