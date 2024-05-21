<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUzytkownicyTable extends Migration
{
    public function up()
    {
        Schema::create('uzytkownicy', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa_uzytkownika');
            $table->string('email')->unique();
            $table->string('haslo');
            $table->datetime('data_rejestracji');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('rola_id');
            $table->timestamps();

            $table->foreign('rola_id')->references('id')->on('role');
        });
    }

    public function down()
    {
        Schema::dropIfExists('uzytkownicy');
    }
}

