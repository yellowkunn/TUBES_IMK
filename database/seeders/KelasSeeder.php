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
                'foto' => 'nama-file-foto-1.jpg',
                'deskripsi' => 'Deskripsi kelas pertama',
                'harga' => 100000.00,
                'fasilitas' => 'Fasilitas kelas pertama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto' => 'nama-file-foto-2.jpg',
                'deskripsi' => 'Deskripsi kelas kedua',
                'harga' => 150000.00,
                'fasilitas' => 'Fasilitas kelas kedua',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto' => 'nama-file-foto-3.jpg',
                'deskripsi' => 'Deskripsi kelas ketiga',
                'harga' => 200000.00,
                'fasilitas' => 'Fasilitas kelas ketiga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto' => 'nama-file-foto-4.jpg',
                'deskripsi' => 'Deskripsi kelas keempat',
                'harga' => 250000.00,
                'fasilitas' => 'Fasilitas kelas keempat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'foto' => 'nama-file-foto-5.jpg',
                'deskripsi' => 'Deskripsi kelas kelima',
                'harga' => 300000.00,
                'fasilitas' => 'Fasilitas kelas kelima',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
