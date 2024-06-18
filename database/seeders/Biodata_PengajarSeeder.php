<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Biodata_PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('biodata_pengajar')->insert(
        [
            'pengguna_id' => 2,
            'nama_lengkap' => 'Yohana Septamia',
            'jenis_kelamin' => 'Perempuan',
            'tmpt_tgl_lahir' => '1990-05-15',
            'agama' => 'Kristen',
            'kewarganegaraan' => 'Indonesia',
            'alamat' => 'Jl. Contoh No. 123',
            'no_telepon' => '021-12345678',
            'no_hp' => '08123456789',
            'pendidikan' => 'S1 Teknologi Informasi'
        ],
        [
            'pengguna_id' => 3,
            'nama_lengkap' => 'Citra Lestari',
            'jenis_kelamin' => 'Perempuan',
            'tmpt_tgl_lahir' => '1992-12-10',
            'agama' => 'Islam',
            'kewarganegaraan' => 'Indonesia',
            'alamat' => 'Jl. Contoh No. 456',
            'no_telepon' => '011-9876543',
            'no_hp' => '089876543210',
            'pendidikan' => 'S1 Ilmu Komputer'
        ],
    );
    }
}
