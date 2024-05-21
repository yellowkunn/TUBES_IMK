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
        Schema::create('biodata_siswa', function (Blueprint $table) {
            $table->id('id_biodata');
            $table->foreignId('pengguna_id')->constrained('users', 'id_pengguna')->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->string('no_hp');
            $table->string('pendidikan');
            $table->string('diterimakursus');
            $table->string('tingkat_kelas');
            $table->string('nama_ortu');
            $table->string('tempat_lahir_ortu');
            $table->date('tgl_lahir_ortu');
            $table->string('agama_ortu');
            $table->string('pendidikan_ortu');
            $table->string('pekerjaan_ortu');
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
        Schema::dropIfExists('biodata_siswa_tabel');
    }
};
