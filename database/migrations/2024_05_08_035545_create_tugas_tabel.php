<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id('id_tugas');
            $table->foreignId('pengajar_id')->constrained('pengajar', 'id_pengajar')->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained('siswa', 'id_siswa')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas', 'id_kelas')->onDelete('cascade');
            $table->string('judul_tugas');
            $table->text('deskripsi');
            $table->string('file_tugas')->nullable();
            $table->dateTime('tgl_dibuat');
            $table->dateTime('tgl_batas');
            $table->dateTime('tgl_dikumpul')->nullable();
            $table->string('file_materi')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas_tabel');
    }
};
