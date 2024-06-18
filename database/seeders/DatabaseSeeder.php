<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Pertemuan;
use App\Models\Pengajar;
use App\Models\Siswa;
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
        $this -> call(UserSeeder::class);
        $this -> call(KelasSeeder::class);
        $this -> call(SiswaSeeder::class);
        $this -> call(PengajarSeeder::class);
        $this -> call(Biodata_siswaSeeder::class);
        $this -> call(Biodata_PengajarSeeder::class);
        $this -> call(PertemuanSeeder::class);
        

        // User::factory(10)->create();
        // Siswa::factory(10)->create();
        // Kelas::factory(5)->create();
        // Pertemuan::factory(10)->create();
        // Biodata_siswa::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
