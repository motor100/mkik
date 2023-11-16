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
        Schema::table('prepodavatelyam_maketys', function (Blueprint $table) {
            $table->string('sig_file')->nullable()->after('file');
            $table->string('key_file')->nullable()->after('sig_file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prepodavatelyam_maketys', function (Blueprint $table) {
            $table->dropColumn('sig_file');
            $table->dropColumn('key_file');
        });
    }
};
