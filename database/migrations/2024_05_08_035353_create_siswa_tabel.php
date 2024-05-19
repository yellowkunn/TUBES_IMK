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
            $table->foreignId('kelas_id')->constrained('kelas', 'id_kelas')->onDelete('cascade');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'MenungguVerif'])->default('Aktif');
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
        Schema::dropIfExists('siswa_tabel');
    }
};
