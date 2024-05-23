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
        IN id_pengguna BIGINT,
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
        IN tingkat_kelas VARCHAR(255),
        IN namaortu VARCHAR(255),
        IN tempatlahirortu VARCHAR(255),
        IN tanggallahirortu DATE,
        IN agamaortu VARCHAR(255),
        IN pendidikanortu VARCHAR(255),
        IN pekerjaanortu VARCHAR(255)
        )
        BEGIN
        INSERT INTO biodata_siswa(
            pengguna_id, foto, nama_lengkap, jenis_kelamin, tempat_lahir, tgl_lahir, agama, kewarganegaraan, alamat, 
            no_telepon, no_hp, pendidikan, diterimakursus, tingkat_kelas, nama_ortu, tempat_lahir_ortu, tgl_lahir_ortu, agama_ortu, 
            pendidikan_ortu, pekerjaan_ortu
        ) VALUES (
            id_pengguna, gambar, namalengkap, gender, tempatlahir, tanggallahir, agama, kewarganegaraan, alamat, 
            notelp, nohp, pendidikanterakhir, diterimakursus, tingkat_kelas, namaortu, tempatlahirortu, tanggallahirortu, agamaortu, 
            pendidikanortu, pekerjaanortu
        );
    END;
    ');

    
    DB::unprepared('
    DROP PROCEDURE IF EXISTS insert_siswa;
    CREATE PROCEDURE insert_siswa (
        IN id_pengguna BIGINT,
        IN kelas BIGINT,
        IN status ENUM("Aktif", "Tidak Aktif", "MenungguVerif")
    )
    BEGIN
        INSERT INTO siswa(
            pengguna_id, kelas_id, status
        ) VALUES (
            id_pengguna, kelas, status
        );
    END;    
    ');

    DB::unprepared('
    DROP PROCEDURE IF EXISTS kelas_baru;
    CREATE PROCEDURE kelas_baru (
        nama VARCHAR(255),
        tingkat_kelas VARCHAR(255),
        gambar VARCHAR(255),
        deskripsi TEXT,
        harga DECIMAL(10,2),
        fasilitas TEXT,
        rentang VARCHAR(255),
        jadwal_hari VARCHAR(255),
        durasi VARCHAR(255)
    )
    BEGIN
        INSERT INTO kelas(
        nama, tingkat_kelas, foto, deskripsi, harga, fasilitas, rentang, jadwal_hari, durasi
        ) VALUES (
        nama, tingkat_kelas, gambar, deskripsi, harga, fasilitas, rentang, jadwal_hari, durasi
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
