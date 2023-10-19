<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('сalendars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('text')->nullable();
            $table->string('slug')->unique();
            $table->integer('year');
            $table->string('date', 20);
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
        Schema::dropIfExists('сalendars');
    }
}
