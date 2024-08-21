<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenjualanDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_detail' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_penjualan_detail' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'null'              => true
            ],
            'id_produk_detail' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'null'              => true
            ],
            'harga_detail' => [
                'type'              => 'INT',
                'constraint'        => 20
            ],
            'qty_detail' => [
                'type'              => 'INT',
                'constraint'        => 20
            ],
            'diskon_detail' => [
                'type'              => 'INT',
                'constraint'        => 20
            ],
            'total_detail' => [
                'type'              => 'INT',
                'constraint'        => 20
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
        $this->forge->addKey('id_detail', true);
        $this->forge->createTable('detail_penjualan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_penjualan');
    }
}
