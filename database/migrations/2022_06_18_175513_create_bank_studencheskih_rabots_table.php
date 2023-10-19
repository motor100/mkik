<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateBankStudencheskihRabotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eios_bank_studencheskih_rabots', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->text('text')->nullable();
            $table->string('slug')->unique();
            $table->string('course')->nullable();
            $table->string('pdf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_studencheskih_rabots');
    }
}
