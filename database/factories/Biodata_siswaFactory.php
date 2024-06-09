<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Biodata_siswa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biodata_siswa>
 */
class Biodata_siswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = \App\Models\User::where('role', 'user')->inRandomOrder()->first();

        return [
        'pengguna_id' => $user->id_pengguna,
        'foto' => fake()->imageUrl(640, 480, 'biodata_siswa', true),
        'nama_lengkap' => $user->username,
        'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
        'tempat_lahir' => fake()->randomElement(['Jakarta', 'Medan', 'Pekanbaru', 'Bekasi', 'Manado']),
        'tgl_lahir' => fake()->date(),
        'agama' => fake()->randomElement(['Islam', 'Kristen', 'Buddha', 'Hindu', 'Konghucu']),
        'kewarganegaraan' => 'Indonesia',
        'alamat' => 'Jl. Merdeka No. 1, Jakarta',
        'no_telepon' => '02112345678',
        'no_hp' => '08123456789',
        'pendidikan' => fake()->randomElement(['SD', 'SMP', 'SMA', 'Sarjana']),
        'diterimakursus' => '2020-07-01',
        'tingkat_kelas' => fake()->randomElement(['SD', 'SMP', 'SMA', 'Sarjana']),
        'nama_ortu' => fake()->word(),
        'tempat_lahir_ortu' => fake()->randomElement(['Jakarta', 'Medan', 'Pekanbaru', 'Bekasi', 'Manado']),
        'tgl_lahir_ortu' => '1975-03-20',
        'agama_ortu' => fake()->randomElement(['SD', 'SMP', 'SMA', 'Sarjana']),
        'pendidikan_ortu' => fake()->randomElement(['SD', 'SMP', 'SMA', 'Sarjana']),
        'pekerjaan_ortu' => 'Pegawai Negeri'
        ];
    }
}
