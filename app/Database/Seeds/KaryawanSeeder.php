<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID'); 

        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'nama_karyawan'   => $faker->name(),
                'alamat_karyawan' => $faker->address(),
                'telepon_karyawan' => $faker->phoneNumber(),
                'email_karyawan'  => $faker->unique()->safeEmail(),
                'created_at'      => \CodeIgniter\I18n\Time::now(), 
                'updated_at'      => \CodeIgniter\I18n\Time::now(),
            ];
        }

        $this->db->table('karyawan')->insertBatch($data);
    }
}