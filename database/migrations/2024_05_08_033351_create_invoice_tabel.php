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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->foreignId('pengguna_id')->constrained('users', 'id_pengguna')->onDelete('cascade');
            $table->foreignId('paket_langganan_id')->constrained('paket_langganan', 'id_langganan')->onDelete('cascade');
            $table->decimal('total_biaya', 10, 2);
            $table->enum('status', ['Belum Dibayar', 'Sudah Dibayar', 'Dibatalkan'])->default('Belum Dibayar');
            $table->dateTime('tanggal_pembuatan_tagihan');
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
        Schema::dropIfExists('invoice_tabel');
    }
};
