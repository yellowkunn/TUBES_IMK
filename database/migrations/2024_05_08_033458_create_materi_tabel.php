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
        Schema::create('materi', function (Blueprint $table) {
            $table->id('id_materi');
            $table->foreignId('pertemuan_id')->constrained('pertemuan', 'id_pertemuan')->onDelete('cascade');
            $table->string('file_materi');
            $table->string('nama_asli_file_materi');
            $table->time('jam_akses')->nullable();
            $table->dateTime('tgl_akses')->nullable();
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
        Schema::dropIfExists('materi_tabel');
    }
};
