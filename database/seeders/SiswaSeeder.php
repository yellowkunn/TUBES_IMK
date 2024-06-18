<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswaData = [
            [
                'pengguna_id' => 4,
                'kelas_id' => 1,
                'status' => 'Aktif'
            ],
            [
                'pengguna_id' => 5,
                'kelas_id' => 2,
                'status' => 'Aktif'
            ],
            [
                'pengguna_id' => 6,
                'kelas_id' => 3,
                'status' => 'Aktif'
            ],
            [
                'pengguna_id' => 4,
                'kelas_id' => 4,
                'status' => 'TidakAktif'
            ],
            [
                'pengguna_id' => 5,
                'kelas_id' => 5,
                'status' => 'MenungguVerif'
            ],
            [
                'pengguna_id' => 5,
                'kelas_id' => 6,
                'status' => 'MenungguVerif'
            ],
        ];

        DB::table('siswa')->insert($siswaData);
    }
}