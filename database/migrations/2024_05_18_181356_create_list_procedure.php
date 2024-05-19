<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
        DROP PROCEDURE IF EXISTS kirimformulirpendaftaran;
        CREATE PROCEDURE kirimformulirpendaftaran (
            IN id_pengguna INT,
            IN gambar VARCHAR(255),
            IN namalengkap VARCHAR(255),
            IN gender ENUM("Laki-laki", "Perempuan"),
            IN tempatlahir VARCHAR(255),
            IN tanggallahir DATE,
            IN agama VARCHAR(255),
            IN kewarganegaraan VARCHAR(255),
            IN alamat TEXT,
            IN notelp VARCHAR(255),
            IN nohp VARCHAR(255),
            IN pendidikanterakhir VARCHAR(255),
            IN diterimakursus VARCHAR(255),
            IN namaortu VARCHAR(255),
            IN tempatlahirortu VARCHAR(255),
            IN tanggallahirortu DATE,
            IN agamaortu VARCHAR(255),
            IN pendidikanortu VARCHAR(255),
            IN pekerjaanortu VARCHAR(255),
            IN kelas INT,
            IN status ENUM("Aktif", "Tidak Aktif", "MenungguVerif")
        )
        BEGIN
            INSERT INTO biodata_siswa(
                pengguna_id, foto, nama_lengkap, jenis_kelamin, tempat_lahir, tgl_lahir, agama, kewarganegaraan, alamat, 
                no_telepon, no_hp, pendidikan, diterimakursus, nama_ortu, tempat_lahir_ortu, tgl_lahir_ortu, agama_ortu, 
                pendidikan_ortu, pekerjaan_ortu
            ) VALUES (
                id_pengguna, gambar, namalengkap, gender, tempatlahir, tanggallahir, agama, kewarganegaraan, alamat, 
                notelp, nohp, pendidikanterakhir, diterimakursus, namaortu, tempatlahirortu, tanggallahirortu, agamaortu, 
                pendidikanortu, pekerjaanortu
            );
    
            INSERT INTO siswa(
                pengguna_id, kelas_id, status
            ) VALUES (
                id_pengguna, kelas, status
            );
        END;
    ');
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_procedure');
    }
};
