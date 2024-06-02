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
            $table->foreignId('pertemuan_id')->constrained('pertemuan', 'id_pertemuan')->onDelete('cascade');
            $table->string('file_tugas');
            $table->dateTime('tgl_akses');
            $table->dateTime('tgl_batas_akses');
            $table->string('file_materi');
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
        Schema::dropIfExists('tugas_tabel');
    }
};
