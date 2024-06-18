<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rapor', function (Blueprint $table) {
            $table->id('id_rapor');
            $table->foreignId('pengguna_id')->constrained('users', 'id_pengguna')->onDelete('cascade');
            $table->enum('jenis_rapor', ['raporBulanan', 'raporTengahSemester', 'raporSemester']);
            $table->decimal('pengetahuan', 5, 2);
            $table->decimal('keterampilan', 5, 2);
            $table->decimal('sikap', 5, 2);
            $table->text('catatan');
            $table->timestamp('dibuat')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapor');
    }
};
