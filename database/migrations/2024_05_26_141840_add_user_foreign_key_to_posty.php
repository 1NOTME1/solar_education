<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserForeignKeyToPosty extends Migration
{
    public function up()
    {
        // Upewniamy się, że tabela users jest już stworzona
        Schema::table('posty', function (Blueprint $table) {
            // Dodanie kolumny, jeśli nie istnieje
            if (!Schema::hasColumn('posty', 'uzytkownik_id')) {
                $table->unsignedBigInteger('uzytkownik_id')->nullable();
            }

            // Dodanie klucza obcego
            $table->foreign('uzytkownik_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('posty', function (Blueprint $table) {
            $table->dropForeign(['uzytkownik_id']);
        });
    }
}

