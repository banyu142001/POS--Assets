<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Testimoni extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_test' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'ulasan' => [
                'type'           => 'TEXT',
            ],
            'performa' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'desain' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
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

        $this->forge->addKey('id_test', true);
        $this->forge->createTable('testimoni');
    }

    public function down()
    {
        $this->forge->dropTable('testimoni');
    }
}
