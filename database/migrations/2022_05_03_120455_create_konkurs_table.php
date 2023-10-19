<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonkursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konkurses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('text');
            $table->string('slug')->unique();
            $table->string('date', 10);
            $table->string('place');
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
        Schema::dropIfExists('konkurs');
    }
}
