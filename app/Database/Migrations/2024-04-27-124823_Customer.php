<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_customer' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_customer' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'jenis_kelamin' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'no_telephone' => [
                'type'           => 'VARCHAR',
                'constraint'     => 12,
            ],
            'alamat' => [
                'type'           => 'TEXT',
                'null'           => true,
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

        $this->forge->addKey('id_customer', true);
        $this->forge->createTable('customer');
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
