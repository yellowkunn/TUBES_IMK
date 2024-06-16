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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id_notification');
            $table->foreignId('pengguna_id')->constrained('users', 'id_pengguna')->onDelete('cascade')->onUpdate('CASCADE');
            $table->string('title')->default('Fortunate Education Center');
            $table->text('keterangan')->nullable();
            $table->timestamp('dibuat')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
