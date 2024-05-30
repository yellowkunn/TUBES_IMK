<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Biodata_siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this -> call(UserSeeder::class);
        $this -> call(KelasSeeder::class);
        $this -> call(PengajarSeeder::class);
        $this -> call(Biodata_siswaSeeder::class);
        $this -> call(Biodata_PengajarSeeder::class);
        $this -> call(SiswaSeeder::class);
    }
}
