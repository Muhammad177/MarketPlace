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
    Schema::create('shops', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id');
        $table->foreignId('user_id');
        $table->string('nama_barang');
        $table->integer('jumlah_barang');
        $table->bigInteger('harga_barang');
        $table->text('deskripsi_barang')->nullable();
        $table->string('code_barang')->unique();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
