<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_produk' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'nama_produk' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_satuan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'harga' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'stok' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'null'           => true
            ],

            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true
            ],

        ]);;
        $this->forge->addKey('id_produk', true);
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id_kategori');
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id_satuan');
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
