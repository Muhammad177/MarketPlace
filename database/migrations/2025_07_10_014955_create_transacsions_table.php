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
        Schema::create('transacsions', function (Blueprint $table) {
     $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('shop_id')->constrained()->onDelete('cascade');
    $table->string('nama_barang');
    $table->integer('jumlah');
    $table->integer('harga_satuan');
    $table->integer('total_harga');
    $table->string('status')->default('pending');
    $table->string('nomor_pemesanan')->unique();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacsions');
    }
};
