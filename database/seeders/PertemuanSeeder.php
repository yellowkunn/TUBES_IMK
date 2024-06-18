<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PertemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pertemuan')->insert(
        [
            'pengajar_id' => 2,
            'kelas_id' => 1,
            'pertemuan_ke' => 1,
            'judul' => 'Membaca Cerita',
            'deskripsi' => 'Membaca cerita dari buku ajar hal 47',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 2,
            'pertemuan_ke' => 1,
            'judul' => 'Membuat Drama',
            'deskripsi' => 'Materi drama dari buku ajar hal 46',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 2,
            'kelas_id' => 1,
            'pertemuan_ke' => 2,
            'judul' => 'Menulis Pengalaman',
            'deskripsi' => 'Bercerita pengalaman liburan ke depan kelas',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 2,
            'pertemuan_ke' => 2,
            'judul' => 'Belajar pantun',
            'deskripsi' => 'Membuat pantun secara cepat dan kreatif',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],

        [
            'pengajar_id' => 2,
            'kelas_id' => 3,
            'pertemuan_ke' => 1,
            'judul' => 'Membuat drama lanjutan',
            'deskripsi' => 'buku ajar hal 51',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 4,
            'pertemuan_ke' => 1,
            'judul' => 'Say hello',
            'deskripsi' => 'Perkenalan sederhana',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 2,
            'kelas_id' => 3,
            'pertemuan_ke' => 2,
            'judul' => 'Menulis surat formal',
            'deskripsi' => 'Latihan membuat surat untuk instansi',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 4,
            'pertemuan_ke' => 2,
            'judul' => 'How do you do?',
            'deskripsi' => 'Belajar menyapa orang baru',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],

        [
            'pengajar_id' => 2,
            'kelas_id' => 5,
            'pertemuan_ke' => 1,
            'judul' => 'Greeting strangers',
            'deskripsi' => 'buku ajar hal 80',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 6,
            'pertemuan_ke' => 1,
            'judul' => 'Basic Conversations',
            'deskripsi' => 'Konversasi dengan teman sebangku',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 2,
            'kelas_id' => 5,
            'pertemuan_ke' => 2,
            'judul' => 'Writing letters',
            'deskripsi' => 'Latihan membuat surat buku ajar 24',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 6,
            'pertemuan_ke' => 2,
            'judul' => 'What, why, how?',
            'deskripsi' => 'Lanjutan dari pertemuan minggu lalu',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],

        [
            'pengajar_id' => 2,
            'kelas_id' => 7,
            'pertemuan_ke' => 1,
            'judul' => 'Belajar berhitung',
            'deskripsi' => 'belajar berhitung 1-20',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 8,
            'pertemuan_ke' => 1,
            'judul' => 'Diagram ven',
            'deskripsi' => 'Belajar dari buku ajar 12',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 2,
            'kelas_id' => 7,
            'pertemuan_ke' => 2,
            'judul' => 'Lanjutan minggu lalu',
            'deskripsi' => 'Belajar bersama dengan teman sebangku',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 8,
            'pertemuan_ke' => 2,
            'judul' => 'Segitiga',
            'deskripsi' => 'Segitiga sama sisi dari buku ajar hal 15',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],

        [
            'pengajar_id' => 2,
            'kelas_id' => 9,
            'pertemuan_ke' => 1,
            'judul' => 'Geometri',
            'deskripsi' => 'belajar berhitung 1-20',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 10,
            'pertemuan_ke' => 1,
            'judul' => 'Listening',
            'deskripsi' => 'Listening bersama dari buku ajar hal 18',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 2,
            'kelas_id' => 9,
            'pertemuan_ke' => 2,
            'judul' => 'Integral',
            'deskripsi' => 'Dari buku ajar 52 dengan latihan',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 10,
            'pertemuan_ke' => 2,
            'judul' => 'Reading',
            'deskripsi' => 'Mengerjakan soal bersama bergantian',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],

        [
            'pengajar_id' => 3,
            'kelas_id' => 11,
            'pertemuan_ke' => 1,
            'judul' => 'Listening',
            'deskripsi' => 'Mendengarkan berita BBC',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
        [
            'pengajar_id' => 3,
            'kelas_id' => 11,
            'pertemuan_ke' => 2,
            'judul' => 'Reading',
            'deskripsi' => 'Membaca berita secara bersama sama',
            'tgl_pertemuan' => fake()->date(),
            'dibuat' => now(),
        ],
    );

    }
}
