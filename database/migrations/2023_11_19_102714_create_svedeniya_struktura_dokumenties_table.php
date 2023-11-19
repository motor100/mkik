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
        Schema::create('svedeniya_struktura_dokumenties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->string('sig_file')->nullable();
            $table->string('key_file')->nullable();
            $table->string('filetype', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('svedeniya_struktura_dokumenties');
    }
};
