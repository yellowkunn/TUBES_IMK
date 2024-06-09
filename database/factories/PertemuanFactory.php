<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Pertemuan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pertemuan>
 */
class PertemuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pengajar_id' => '2',
            'kelas_id' => fake()->numberBetween(1, 4),
            'pertemuan_ke' => fake()->numberBetween(1, 8),
            'judul' => fake()->word(7),
            'deskripsi' => fake()->word(20),
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ];
    }
}
