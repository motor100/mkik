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
        Schema::table('pedagogicheskij_sostav_dokuments', function (Blueprint $table) {
            $table->string('sig_file')->after('file')->change();
            $table->string('key_file')->after('sig_file')->change();
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
