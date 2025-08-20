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
    Schema::create('pembelian_detail', function (Blueprint $table) {
        $table->id('pembelian_detail_id');
        $table->foreignId('pembelian_detail_pembelian_id')
              ->constrained('pembelian', 'pembelian_id')
              ->onDelete('cascade');
        $table->foreignId('pembelian_detail_pakaian_id')
              ->constrained('pakaian', 'pakaian_id')
              ->onDelete('cascade');
        $table->integer('pembelian_detail_jumlah');
        $table->decimal('pembelian_detail_total_harga', 12, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_detail');
    }
};
