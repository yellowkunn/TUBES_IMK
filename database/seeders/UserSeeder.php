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
            'username' => 'ahsan',
            'email' => 'ahsanlubis308@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => null,
            'role' => 'admin',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'yohana',
            'email' => 'yohanas@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => null,
            'role' => 'pengajar',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'sintong',
            'email' => 'sintong@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => null,
            'role' => 'siswa',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        
        [
            'username' => 'sakifa',
            'email' => 'sakifag@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => null,
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ]
    ]);
        
    }
}
