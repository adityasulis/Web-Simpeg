<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class identitasSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     'nik'      => '1234567',
        //     'namapeg'    => 'Aditya Sulistyo',
        //     'jabatan_peg' => 'Staff Pemasaran',
        //     'tmplahir' => 'Wonogiri',
        //     'tgllahir' => '1998-03-25',
        //     'alamat' => 'Wonosari RT02/10, Purwosari, Wonogiri',
        //     'Statuspeg' => 'Calon Pegawai',
        //     'statuskeluarga' => 'Belum Menikah'
        // ];

        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++) {
            $data = [
                'nik'      => $faker->randomNumber(7),
                'namapeg'    => $faker->name,
                'jabatan_peg' => 'Staff Pemasaran',
                'tmplahir' => $faker->state,
                'tgllahir' => $faker->date,
                'alamat' => $faker->address,
                'Statuspeg' => 'Calon Pegawai',
                'statuskeluarga' => 'Belum Menikah'
            ];
            $this->db->table('identitaspeg')->insert($data);
        }

        // Simple Queries
        // $this->db->query("INSERT INTO identitaspeg (nik, namapeg, jabatan_peg, tmplahir, tgllahir,alamat,Statuspeg, statuskeluarga) 
        // VALUES(:nik:, :namapeg:, :jabatan_peg:, :tmplahir:, :tgllahir:, :alamat:, :Statuspeg:, :statuskeluarga:)", $data);

        // Using Query Builder
        // $this->db->table('identitaspeg')->insert($data);
    }
}
