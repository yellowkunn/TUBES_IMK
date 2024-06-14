<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->foreignId('siswa_id')->constrained('siswa', 'id_siswa')->onDelete('cascade')->onUpdate('CASCADE');
            $table->foreignId('kelas_id')->constrained('kelas', 'id_kelas')->onDelete('cascade')->onUpdate('CASCADE');
            $table->foreignId('pertemuan_id')->constrained('pertemuan', 'id_pertemuan')->onDelete('cascade')->onUpdate('CASCADE');
            $table->date('tanggal');
            $table->enum('status', ['Hadir', 'Tidak Hadir'])->default('Hadir');
            $table->enum('role', ['Pengajar', 'Siswa'])->default('Siswa');
            $table->timestamp('dibuat')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
