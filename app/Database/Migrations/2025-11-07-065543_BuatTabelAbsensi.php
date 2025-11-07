<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatTabelAbsensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_absensi' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_karyawan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'waktu_absensi' => [
                'type' => 'DATETIME',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
        ]);
        $this->forge->addKey('id_absensi', true);
        $this->forge->addForeignKey('id_karyawan', 
            'karyawan', 
            'id_karyawan', 
            'CASCADE', 
            'CASCADE');
        $this->forge->createTable('absensi');
    }

    public function down()
    {
        $this->forge->dropTable('absensi');
    }
}