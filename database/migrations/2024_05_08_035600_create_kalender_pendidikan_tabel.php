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
        Schema::create('kalender_pendidikan', function (Blueprint $table) {
            $table->id('id_kalender_pendidikan');
            $table->date('tanggal');
            $table->string('kegiatan');
            $table->integer('lama_waktu');
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
        Schema::dropIfExists('kalender_pendidikan_tabel');
    }
};
