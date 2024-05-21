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
        Schema::create('pengajar', function (Blueprint $table) {
            $table->id('id_pengajar');
            $table->foreignId('pengguna_id')->constrained('users', 'id_pengguna')->onDelete('cascade')->onUpdate('CASCADE');
            $table->foreignId('kelas_id')->constrained('kelas', 'id_kelas')->onDelete('cascade')->onUpdate('CASCADE');
            $table->string('jabatan');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
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
        Schema::dropIfExists('pengajar_tabel');
    }
};
