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
        CREATE TRIGGER after_user_insert
        AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
            -- Hanya lakukan sesuatu jika peran pengguna adalah "siswa"
            IF NEW.role = "siswa" THEN
                -- Periksa apakah user_id sudah ada di tabel siswa
                IF NOT EXISTS (SELECT 1 FROM siswa WHERE pengguna_id = NEW.id_pengguna) THEN
                    -- Jika belum ada, masukkan data baru ke tabel siswa
                    INSERT INTO siswa (pengguna_id)
                    VALUES (NEW.id_pengguna);
                END IF;
            END IF;
        END
    ');

    DB::unprepared('
    CREATE TRIGGER after_user_update
    AFTER UPDATE ON users
    FOR EACH ROW
    BEGIN
        -- Hanya lakukan sesuatu jika peran pengguna adalah "siswa"
        IF NEW.role = "siswa" THEN
            -- Periksa apakah user_id sudah ada di tabel siswa
            IF NOT EXISTS (SELECT 1 FROM siswa WHERE pengguna_id = NEW.id_pengguna) THEN
                -- Jika belum ada, masukkan data baru ke tabel siswa
                INSERT INTO siswa (pengguna_id)
                VALUES (NEW.id_pengguna);
            END IF;
        END IF;
    END
');

DB::unprepared('
        CREATE TRIGGER after_pengajar_insert
        AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
            -- Hanya lakukan sesuatu jika peran pengguna adalah "pengajar"
            IF NEW.role = "pengajar" THEN
                -- Periksa apakah user_id sudah ada di tabel pengajar
                IF NOT EXISTS (SELECT 1 FROM pengajar WHERE pengguna_id = NEW.id_pengguna) THEN
                    -- Jika belum ada, masukkan data baru ke tabel pengajar
                    INSERT INTO pengajar (pengguna_id)
                    VALUES (NEW.id_pengguna);
                END IF;
            END IF;
        END
    ');

    DB::unprepared('
        CREATE TRIGGER after_pengajar_update
        AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
            -- Hanya lakukan sesuatu jika peran pengguna adalah "pengajar"
            IF NEW.role = "pengajar" THEN
                -- Periksa apakah user_id sudah ada di tabel pengajar
                IF NOT EXISTS (SELECT 1 FROM pengajar WHERE pengguna_id = NEW.id_pengguna) THEN
                    -- Jika belum ada, masukkan data baru ke tabel pengajar
                    INSERT INTO pengajar (pengguna_id)
                    VALUES (NEW.id_pengguna);
                END IF;
            END IF;
        END
    ');

    DB::unprepared('
    CREATE TRIGGER after_user_update_role
    AFTER UPDATE ON users
    FOR EACH ROW
    BEGIN
        -- Hapus data dari tabel siswa jika peran pengguna diubah dari "siswa" menjadi yang lain
        IF OLD.role = "siswa" AND NEW.role != "siswa" THEN
            DELETE FROM siswa WHERE pengguna_id = OLD.id_pengguna;
        END IF;
    END
    ');
    
    DB::unprepared('
    CREATE TRIGGER update_role_to_siswa
    AFTER INSERT ON siswa
    FOR EACH ROW
    BEGIN
        DECLARE role_user VARCHAR(255);
        SELECT role INTO role_user FROM users WHERE id_pengguna = NEW.pengguna_id;

        IF role_user = "user" THEN
            UPDATE users SET role = "siswa" WHERE id_pengguna = NEW.pengguna_id;
        END IF;
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
        Schema::dropIfExists('after_user_update_trigger');
    }
};
