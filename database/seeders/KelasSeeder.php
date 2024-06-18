<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'nama' => 'Bahasa Indonesia',
                'tingkat_kelas' => "SD",
                'foto' => 'kls1.jpeg',
                'deskripsi' => '
                Kelas Bahasa Indonesia Lanjutan untuk SMA dirancang untuk membantu siswa memperdalam 
                pemahaman mereka tentang bahasa dan sastra Indonesia. Materi yang diajarkan mencakup 
                analisis teks sastra, penulisan esai, tata bahasa, dan keterampilan berbicara di depan 
                umum. Dengan bimbingan dari pengajar yang berpengalaman, siswa akan lebih siap untuk 
                menghadapi ujian sekolah, termasuk Ujian Nasional, dan mengembangkan keterampilan 
                berbahasa yang lebih baik.
                ',
                'harga' => 100000.00,
                'fasilitas' => 'Fasilitas kelas pertama',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Rabu, Jumat',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Indonesia',
                'tingkat_kelas' => "SMP",
                'foto' => 'kls1.jpeg',
                'deskripsi' => '
                Kelas Bahasa Indonesia Lanjutan untuk SMA dirancang untuk membantu siswa memperdalam 
                pemahaman mereka tentang bahasa dan sastra Indonesia. Materi yang diajarkan mencakup 
                analisis teks sastra, penulisan esai, tata bahasa, dan keterampilan berbicara di depan 
                umum. Dengan bimbingan dari pengajar yang berpengalaman, siswa akan lebih siap untuk 
                menghadapi ujian sekolah, termasuk Ujian Nasional, dan mengembangkan keterampilan 
                berbahasa yang lebih baik.
                ',
                'harga' => 100000.00,
                'fasilitas' => 'Fasilitas kelas pertama',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Rabu, Jumat',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Indonesia',
                'tingkat_kelas' => "SMA",
                'foto' => 'kls1.jpeg',
                'deskripsi' => '
                Kelas Bahasa Indonesia Lanjutan untuk SMA dirancang untuk membantu siswa memperdalam 
                pemahaman mereka tentang bahasa dan sastra Indonesia. Materi yang diajarkan mencakup 
                analisis teks sastra, penulisan esai, tata bahasa, dan keterampilan berbicara di depan 
                umum. Dengan bimbingan dari pengajar yang berpengalaman, siswa akan lebih siap untuk 
                menghadapi ujian sekolah, termasuk Ujian Nasional, dan mengembangkan keterampilan 
                berbahasa yang lebih baik.
                ',
                'harga' => 100000.00,
                'fasilitas' => 'Fasilitas kelas pertama',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Rabu, Jumat',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Inggris',
                'tingkat_kelas' => "SD",
                'foto' => 'ing.jpeg',
                'deskripsi' => '
                Kelas bahasa Inggris di FEC didesain untuk memperkuat kemampuan 
                berbicara, mendengar, membaca, dan menulis. Kami mengutamakan pendekatan komunikatif 
                yang memungkinkan siswa untuk langsung terlibat dalam berbagai aktivitas praktis, 
                seperti permainan peran, diskusi kelompok, dan simulasi situasi kehidupan nyata.
                ',
                'harga' => 150000.00,
                'fasilitas' => 'Fasilitas kelas kedua',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Selasa, Kamis, Sabtu',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Inggris',
                'tingkat_kelas' => "SMP",
                'foto' => 'ing.jpeg',
                'deskripsi' => '
                Kelas bahasa Inggris di FEC didesain untuk memperkuat kemampuan 
                berbicara, mendengar, membaca, dan menulis. Kami mengutamakan pendekatan komunikatif 
                yang memungkinkan siswa untuk langsung terlibat dalam berbagai aktivitas praktis, 
                seperti permainan peran, diskusi kelompok, dan simulasi situasi kehidupan nyata.
                ',
                'harga' => 150000.00,
                'fasilitas' => 'Fasilitas kelas kedua',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Selasa, Kamis, Sabtu',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Bahasa Inggris',
                'tingkat_kelas' => "SMA",
                'foto' => 'ing.jpeg',
                'deskripsi' => '
                Kelas bahasa Inggris di FEC didesain untuk memperkuat kemampuan 
                berbicara, mendengar, membaca, dan menulis. Kami mengutamakan pendekatan komunikatif 
                yang memungkinkan siswa untuk langsung terlibat dalam berbagai aktivitas praktis, 
                seperti permainan peran, diskusi kelompok, dan simulasi situasi kehidupan nyata.
                ',
                'harga' => 150000.00,
                'fasilitas' => 'Fasilitas kelas kedua',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Selasa, Kamis, Sabtu',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Matematika',
                'tingkat_kelas' => "SD",
                'foto' => 'kls2.jpeg',
                'deskripsi' => '
                Kelas Matematika Lanjutan untuk SMA dirancang untuk siswa yang ingin memperdalam 
                pemahaman mereka tentang matematika di tingkat menengah atas. Kelas ini mencakup 
                berbagai topik penting seperti aljabar, geometri, trigonometri, dan kalkulus. Dengan 
                bimbingan dari pengajar yang berpengalaman, siswa akan mendapatkan penjelasan yang 
                jelas dan mendalam, serta latihan soal yang bervariasi. Kelas ini juga membantu siswa 
                mempersiapkan diri untuk ujian sekolah dan masuk perguruan tinggi dengan percaya diri.
                ',
                'harga' => 200000.00,
                'fasilitas' => 'Fasilitas kelas ketiga',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Rabu, Jumat',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Matematika',
                'tingkat_kelas' => "SMP",
                'foto' => 'kls2.jpeg',
                'deskripsi' => '
                Kelas Matematika Lanjutan untuk SMA dirancang untuk siswa yang ingin memperdalam 
                pemahaman mereka tentang matematika di tingkat menengah atas. Kelas ini mencakup 
                berbagai topik penting seperti aljabar, geometri, trigonometri, dan kalkulus. Dengan 
                bimbingan dari pengajar yang berpengalaman, siswa akan mendapatkan penjelasan yang 
                jelas dan mendalam, serta latihan soal yang bervariasi. Kelas ini juga membantu siswa 
                mempersiapkan diri untuk ujian sekolah dan masuk perguruan tinggi dengan percaya diri.
                ',
                'harga' => 200000.00,
                'fasilitas' => 'Fasilitas kelas ketiga',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Rabu, Jumat',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'Matematika',
                'tingkat_kelas' => "SMA",
                'foto' => 'kls2.jpeg',
                'deskripsi' => '
                Kelas Matematika Lanjutan untuk SMA dirancang untuk siswa yang ingin memperdalam 
                pemahaman mereka tentang matematika di tingkat menengah atas. Kelas ini mencakup 
                berbagai topik penting seperti aljabar, geometri, trigonometri, dan kalkulus. Dengan 
                bimbingan dari pengajar yang berpengalaman, siswa akan mendapatkan penjelasan yang 
                jelas dan mendalam, serta latihan soal yang bervariasi. Kelas ini juga membantu siswa 
                mempersiapkan diri untuk ujian sekolah dan masuk perguruan tinggi dengan percaya diri.
                ',
                'harga' => 200000.00,
                'fasilitas' => 'Fasilitas kelas ketiga',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Rabu, Jumat',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'TOEFL',
                'tingkat_kelas' => "Umum",
                'foto' => 'ing.jpeg',
                'deskripsi' => '
                Kelas persiapan ujian TOEFL di FEC didesain secara khusus untuk mempersiapkan siswa dengan 
                strategi yang efektif dalam menjawab setiap bagian ujian. Kami menekankan pada latihan 
                berulang, pemahaman mendalam tentang format ujian, dan teknik-teknik kunci yang diperlukan 
                untuk berhasil.
                ',
                'harga' => 250000.00,
                'fasilitas' => 'Fasilitas kelas keempat',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Selasa, Kamis, Sabtu',
                'durasi' => '90 Menit',
                'dibuat' => now(),

            ],
            [
                'nama' => 'IELTS',
                'tingkat_kelas' => "Umum",
                'foto' => 'ing.jpeg',
                'deskripsi' => '
                Kurikulum kami dirancang untuk mencakup empat modul utama ujian IELTS: Listening, Reading, Writing, 
                dan Speaking. Setiap modul diajarkan secara terpisah dengan fokus pada pemahaman yang mendalam 
                tentang format ujian dan teknik-teknik kunci untuk mencapai skor yang tinggi.
                ',
                'harga' => 300000.00,
                'fasilitas' => 'Fasilitas kelas kelima',
                'rentang' => '8 pertemuan',
                'jadwal_hari' => 'Senin, Rabu, Jumat',
                'durasi' => '90 Menit',
                'dibuat' => now(),
            ],
        ]);
    }
}
