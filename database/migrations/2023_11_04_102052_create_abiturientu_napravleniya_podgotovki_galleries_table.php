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
        Schema::create('abiturientu_napravleniya_podgotovkis_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('anp_id');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abiturientu_napravleniya_podgotovkis_galleries');
    }
};
