<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([        
            [
                // admin
                'username' => 'ahsan',
                'email' => 'ahsanlubis308@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],

            //pengajar
            [
                'username' => 'yohana',
                'email' => 'yohanas@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'pengajar',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'citra',
                'email' => 'citra@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'pengajar',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],

            // siswa
            [
                'username' => 'sakifa',
                'email' => 'sakifag@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'siswa',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'dani',
                'email' => 'dani@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'siswa',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'elsa',
                'email' => 'elsa@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'siswa',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'ramli',
                'email' => 'ramli@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'siswa',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'joko',
                'email' => 'joko@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'siswa',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'rahma',
                'email' => 'rahma@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'siswa',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'ani',
                'email' => 'ani@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'siswa',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'budi',
                'email' => 'budi@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'siswa',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
        
            // user
            [
                'username' => 'sintong',
                'email' => 'sintong@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'user',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'alina',
                'email' => 'alina@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'user',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'bima',
                'email' => 'bima@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'user',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
            [
                'username' => 'fajar',
                'email' => 'fajar@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'foto_profile' => 'file_20240519034914.jpeg',
                'role' => 'user',
                'remember_token' => Str::random(10),
                'dibuat' => now(),
            ],
        ]);
    }
}