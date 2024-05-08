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
        Schema::create('biodata_pengajar', function (Blueprint $table) {
            $table->id('id_biodata');
            $table->foreignId('id_pengguna')->constrained('users', 'id_pengguna')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tmpt_tgl_lahir');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->string('no_hp');
            $table->string('pendidikan');
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
        Schema::dropIfExists('biodata_pengajar_tabel');
    }
};
