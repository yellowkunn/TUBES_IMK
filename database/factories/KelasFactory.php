<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Kelas;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama = fake()->unique()->word();
        while(strlen($nama) <= 5) {
            $nama = fake()->unique()->word();
        }

        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
       
        return [
            'nama' => $nama,
            'tingkat_kelas' => fake()->randomElement(['SD', 'SMP', 'SMA', 'Kuliah', 'Umum']),
            'foto' => 'file_20240519034914.jpeg',
            'deskripsi' => Hash::make('password'),
            'harga' => fake()->numberBetween(500000, 1500000),
            'fasilitas' => 'fasilitas1, fasilitas2, fasilitas3',
            'rentang' => '8 pertemuan',
            'jadwal_hari' => implode(',', fake()->randomElements($hari, fake()->numberBetween(2, 3))),
            'durasi' => '50 menit',
            'dibuat' => now(),
        ];
    }
}
