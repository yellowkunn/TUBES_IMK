<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'nama' => 'Bahasa Indonesia',
                'foto' => 'file_20240519034914.jpeg',
                'deskripsi' => 'Deskripsi kelas pertama',
                'harga' => 100000.00,
                'fasilitas' => 'Fasilitas kelas pertama',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Selasa, Rabu',
                'durasi' => '50 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Inggris',
                'foto' => 'file_20240519034914.jpeg',
                'deskripsi' => 'Deskripsi kelas kedua',
                'harga' => 150000.00,
                'fasilitas' => 'Fasilitas kelas kedua',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Selasa, Rabu',
                'durasi' => '50 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Jerman',
                'foto' => 'file_20240519034914.jpeg',
                'deskripsi' => 'Deskripsi kelas ketiga',
                'harga' => 200000.00,
                'fasilitas' => 'Fasilitas kelas ketiga',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Selasa, Rabu',
                'durasi' => '50 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Jepang',
                'foto' => 'file_20240519034914.jpeg',
                'deskripsi' => 'Deskripsi kelas keempat',
                'harga' => 250000.00,
                'fasilitas' => 'Fasilitas kelas keempat',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Selasa, Rabu',
                'durasi' => '50 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Arab',
                'foto' => 'file_20240519034914.jpeg',
                'deskripsi' => 'Deskripsi kelas kelima',
                'harga' => 300000.00,
                'fasilitas' => 'Fasilitas kelas kelima',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Selasa, Rabu',
                'durasi' => '50 Menit',
                'dibuat' => now(),

            ],
        ]);
    }
}
