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
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'admin',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
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
            'username' => 'sakifa',
            'email' => 'sakifag@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'budi',
            'email' => 'budi@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'siti',
            'email' => 'siti@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'agus',
            'email' => 'agus@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'lina',
            'email' => 'lina@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'pengajar',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'dedi',
            'email' => 'dedi@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'pengajar',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'ayu',
            'email' => 'ayu@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'mila',
            'email' => 'mila@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'pengajar',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'joni',
            'email' => 'joni@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'rani',
            'email' => 'rani@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'pengajar',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'ridho',
            'email' => 'ridho@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'sara',
            'email' => 'sara@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'joko',
            'email' => 'joko@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'pengajar',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'wahyu',
            'email' => 'wahyu@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'kiki',
            'email' => 'kiki@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'foto_profile' => 'file_20240519034914.jpeg',
            'role' => 'user',
            'remember_token' => Str::random(10),
            'dibuat' => now(),
        ],
        [
            'username' => 'edi',
            'email' => 'edi@example.com',
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
