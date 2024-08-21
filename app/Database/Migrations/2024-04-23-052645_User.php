<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'foto' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ],
            'level' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ],
            'alamat' => [
                'type'           => 'TEXT',
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

        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
