<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        DROP VIEW IF EXISTS view_pengajar_unique;
        CREATE VIEW view_pengajar_unique AS SELECT 
            p.id_pengajar,
            u.id_pengguna,
            u.username,
            u.email,
            u.email_verified_at,
            u.password,
            u.foto_profile,
            u.role,
            u.remember_token,
            u.dibuat AS user_dibuat,
            p.kelas_id,
            p.jabatan,
            p.status,
            p.dibuat AS pengajar_dibuat
        FROM pengajar p
        INNER JOIN (
            SELECT pengguna_id, MIN(id_pengajar) AS min_id
            FROM pengajar
            GROUP BY pengguna_id
        ) p_unique ON p.id_pengajar = p_unique.min_id
        INNER JOIN users u ON p.pengguna_id = u.id_pengguna
        WHERE u.role = "pengajar";
    ');
    

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_pengajar');
    }
};
