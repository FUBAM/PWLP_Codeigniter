<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatNoll extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tgl' => [
                'type' => 'timestamp',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('nol');

    }

    public function down()
    {
        $this->forge->dropTable('nol');
    }
}