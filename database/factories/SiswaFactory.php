<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Siswa;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
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
            'pengguna_id' => $user,
            'kelas_id' => \App\Models\Kelas::factory(),
            'status' => fake()->randomElement(['Aktif', 'TidakAktif', 'MenungguVerif']),
            'dibuat' => now(),
        ];
    }
}
