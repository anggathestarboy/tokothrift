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
        Schema::create('users', function (Blueprint $table) {
          $table->id('user_id');
        $table->string('user_username', 50)->unique();
        $table->string('user_password', 255); // bcrypt hash panjang
        $table->string('user_fullname', 100);
        $table->string('user_email', 50)->unique();
        $table->char('user_nohp', 13);
        $table->string('user_alamat', 200);
        $table->string('user_profil_url', 255)->default('url_placeholder_profil');
        $table->enum('user_level', ['Admin', 'Pengguna'])->default('Pengguna');
        $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
