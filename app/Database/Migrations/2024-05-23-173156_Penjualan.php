<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_penjualan' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'invoice' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'id_customer' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'null'              => true
            ],
            'total_harga' => [
                'type'              => 'INT',
                'constraint'        => 20
            ],
            'diskon' => [
                'type'              => 'INT',
                'constraint'        => 20
            ],
            'harga_bayar' => [
                'type'              => 'INT',
                'constraint'        => 20
            ],
            'cash' => [
                'type'              => 'INT',
                'constraint'        => 20
            ],
            'kembalian' => [
                'type'              => 'INT',
                'constraint'        => 20
            ],
            'nota'   => [
                'type'              => 'TEXT',
                'null'              => true,
            ],
            'tanggal'   => [
                'type'              => 'DATE',

            ],
            'id_user' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true
            ],
            'created_at'   => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],

            'updated_at'   => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],

        ]);
        $this->forge->addKey('id_penjualan', true);
        $this->forge->createTable('penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('penjualan');
    }
}
