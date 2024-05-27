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
        DB::statement(" CREATE USER 'admin'@'localhost' IDENTIFIED BY '' ");
        DB::statement(" CREATE USER 'pengajar'@'localhost' IDENTIFIED BY '' ");
        DB::statement(" CREATE USER 'siswa'@'localhost' IDENTIFIED BY '' ");
        DB::statement(" CREATE USER 'user'@'localhost' IDENTIFIED BY '' ");
        
        //sementara privilegenya begini dulu, ntar tak ubah terakhiran deh
        DB::statement(" GRANT ALL PRIVILEGES ON tubes_imk.* TO 'admin'@'localhost' ");
        DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_imk.* TO 'pengajar'@'localhost'; ");
        DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_imk.* TO 'siswa'@'localhost'; ");
        DB::statement(" GRANT SELECT, INSERT, UPDATE, DELETE ON tubes_imk.* TO 'user'@'localhost'; ");
        
        DB::statement(" FLUSH PRIVILEGES ");

        Schema::create('users', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto_profile')->nullable();
            $table->enum('role', ['admin', 'pengajar', 'siswa', 'user'])->default('user');            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
