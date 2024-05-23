<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajar')->insert([
            [
            'pengguna_id' => '2',
            'kelas_id' => '1',
            'jabatan' => 'pengajar',
            'status' => 'Aktif'
            ],
            [
            'pengguna_id' => '2',
            'kelas_id' => '2',
            'jabatan' => 'pengajar',
            'status' => 'Aktif'
            ],
            [
            'pengguna_id' => '2',
            'kelas_id' => '3',
            'jabatan' => 'pengajar',
            'status' => 'Aktif'
            ],
            [
            'pengguna_id' => '2',
            'kelas_id' => '4',
            'jabatan' => 'pengajar',
            'status' => 'Aktif'
            ]
        ]);
    }
}
