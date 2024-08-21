<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StokKeluar extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_stok_keluar' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_supplier' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'type' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'detail' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'qty' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
            'tanggal' => [
                'type'           => 'DATE',
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true
            ],

        ]);
        $this->forge->addKey('id_stok_keluar', true);
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk');
        $this->forge->addForeignKey('id_supplier', 'supplier', 'id_supplier');
        $this->forge->createTable('stok_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('stok_keluar');
    }
}
