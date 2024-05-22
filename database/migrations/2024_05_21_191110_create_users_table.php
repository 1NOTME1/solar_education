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
            $table->id();
            $table->string('name')->nullable();  // Opcjonalne: jeśli chcesz przechowywać imiona użytkowników
            $table->string('email')->unique();  // Email musi być unikalny
            $table->timestamp('email_verified_at')->nullable();  // Data i czas weryfikacji e-mail
            $table->string('password');  // Hasło
            $table->rememberToken();  // Token do funkcji "Zapamiętaj mnie"
            $table->timestamps();  // Znaczniki czasu created_at i updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
