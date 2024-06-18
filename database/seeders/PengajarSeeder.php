<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengajarData = [
            [
                'pengguna_id' => 2,
                'kelas_id' => 1,
                'jabatan' => 'Pengajar',
                'status' => 'Aktif',
                'dibuat' => now()
            ],
            [
                'pengguna_id' => 3,
                'kelas_id' => 2,
                'jabatan' => 'Pengajar',
                'status' => 'Aktif',
                'dibuat' => now()
            ],
            [
                'pengguna_id' => 2,
                'kelas_id' => 3,
                'jabatan' => 'Pengajar',
                'status' => 'Aktif',
                'dibuat' => now()
            ],
            [
                'pengguna_id' => 3,
                'kelas_id' => 4,
                'jabatan' => 'Pengajar',
                'status' => 'Aktif',
                'dibuat' => now()
            ],
            [
                'pengguna_id' => 2,
                'kelas_id' => 5,
                'jabatan' => 'Pengajar',
                'status' => 'Aktif',
                'dibuat' => now()
            ],
            [
                'pengguna_id' => 3,
                'kelas_id' => 6,
                'jabatan' => 'Pengajar',
                'status' => 'Aktif',
                'dibuat' => now()
            ],
        ];

        DB::table('pengajar')->insert($pengajarData);
    }
}