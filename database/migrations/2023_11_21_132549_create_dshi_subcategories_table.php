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
        Schema::create('dshi_subcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dshi_category_id')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedSmallInteger('sort')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dshi_subcategories');
    }
};
