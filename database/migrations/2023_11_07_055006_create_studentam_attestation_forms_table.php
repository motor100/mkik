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
        Schema::create('studentam_attestation_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course')->index();
            $table->unsignedBigInteger('learning_direction_id');
            $table->string('file');
            $table->string('sig_file')->nullable();
            $table->string('key_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentam_attestation_forms');
    }
};
