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
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->id('id_sertifikat');
            $table->foreignId('pengguna_id')->constrained('users', 'id_pengguna')->onDelete('cascade');
            $table->string('nama');
            $table->string('keterangan');
            $table->string('sertifikat');
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
        Schema::dropIfExists('sertifikat_tabel');
    }
};
