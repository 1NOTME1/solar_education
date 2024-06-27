<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ksiezyce', function (Blueprint $table) {
            $table->string('typ')->default('naturalny')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ksiezyce', function (Blueprint $table) {
            $table->string('typ')->default(null)->change(); // Przywrócenie pierwotnego stanu
        });
    }
};
