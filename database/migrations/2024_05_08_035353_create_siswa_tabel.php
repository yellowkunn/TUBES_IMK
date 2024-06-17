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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->foreignId('pengguna_id')->constrained('users', 'id_pengguna')->onDelete('cascade');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas', 'id_kelas')->onDelete('cascade');
            $table->string('jam_kelas')->nullable();
            $table->enum('status', ['Aktif', 'TidakAktif', 'MenungguVerif', 'Ditolak'])->default('Aktif');
            $table->timestamp('dibuat')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa_tabel');
    }
};
