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
    Schema::create('pembelian', function (Blueprint $table) {
        $table->id('pembelian_id');
        $table->foreignId('pembelian_user_id')
              ->constrained('users', 'user_id')
              ->onDelete('cascade');
        $table->foreignId('pembelian_metode_pembayaran_id')
              ->constrained('metode_pembayaran', 'metode_pembayaran_id')
              ->onDelete('cascade');
        $table->timestamp('pembelian_tanggal')->useCurrent();
        $table->decimal('pembelian_total_harga', 12, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
