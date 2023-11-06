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
        Schema::table('abiturientu_napravleniya_podgotovkis', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('slug');
            $table->unsignedBigInteger('learning_direction_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
