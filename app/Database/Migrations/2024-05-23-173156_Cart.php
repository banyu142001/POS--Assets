<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id_cart' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'id_produk' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'null'              => true
            ],
            'harga_data_cart' => [
                'type'              => 'INT',
                'constraint'        => 11
            ],
            'qty_data_cart' => [
                'type'              => 'INT',
                'constraint'        => 11
            ],
            'diskon_data_cart' => [
                'type'              => 'INT',
                'constraint'        => 11
            ],
            'total_data_cart' => [
                'type'              => 'INT',
                'constraint'        => 11
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
        $this->forge->addKey('id_cart', true);
        $this->forge->addForeignKey('id_produk', 'produk', 'id_produk');
        $this->forge->createTable('cart');
    }

    public function down()
    {
        $this->forge->dropTable('cart');
    }
}
