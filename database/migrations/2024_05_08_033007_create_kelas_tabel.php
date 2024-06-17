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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('nama');
            $table->string('tingkat_kelas');
            $table->string('foto')->nullable();
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);
            $table->text('fasilitas');
            $table->string('rentang');
            $table->string('jadwal_hari');
            $table->string('jam')->nullable();
            $table->string('durasi');
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
        Schema::dropIfExists('kelas_tabel');
    }
};
