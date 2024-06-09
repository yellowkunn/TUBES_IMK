<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Biodata_SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biodata_siswa')->insert([
        ['pengguna_id' => 4,
        'foto' => 'ucup.jpg',
        'nama_lengkap' => 'Sakifa',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Jakarta',
        'tgl_lahir' => '2005-01-15',
        'agama' => 'Islam',
        'kewarganegaraan' => 'Indonesia',
        'alamat' => 'Jl. Merdeka No. 1, Jakarta',
        'no_telepon' => '02112345678',
        'no_hp' => '08123456789',
        'pendidikan' => 'SMP',
        'diterimakursus' => '2020-07-01',
        'tingkat_kelas' => 'SMA',
        'nama_ortu' => 'Joko Santoso',
        'tempat_lahir_ortu' => 'Surabaya',
        'tgl_lahir_ortu' => '1975-03-20',
        'agama_ortu' => 'Islam',
        'pendidikan_ortu' => 'S1',
        'pekerjaan_ortu' => 'Pegawai Negeri'
        ],

        ['pengguna_id' => 3,
        'foto' => 'ucup.jpg',
        'nama_lengkap' => 'Sintong Sutanto',
        'jenis_kelamin' => 'Laki-laki',
        'tempat_lahir' => 'Jakarta',
        'tgl_lahir' => '2005-01-15',
        'agama' => 'Yahudi',
        'kewarganegaraan' => 'Indonesia',
        'alamat' => 'Jl. Merdeka No. 1, Jakarta',
        'no_telepon' => '02112345678',
        'no_hp' => '08123456789',
        'pendidikan' => 'SMP',
        'diterimakursus' => '2020-07-01',
        'tingkat_kelas' => 'SMA',
        'nama_ortu' => 'Serafim Sitorus',
        'tempat_lahir_ortu' => 'Surabaya',
        'tgl_lahir_ortu' => '1975-03-20',
        'agama_ortu' => 'Kristen',
        'pendidikan_ortu' => 'S1',
        'pekerjaan_ortu' => 'Pegawai Negeri'
        ]
    ]);
    }
    
}
