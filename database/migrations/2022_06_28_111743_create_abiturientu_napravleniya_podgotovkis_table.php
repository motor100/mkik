<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbiturientuNapravleniyaPodgotovkisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abiturientu_napravleniya_podgotovkis', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('chairman')->nullable();
            $table->text('gallery')->nullable();
            $table->string('teachers')->nullable();
            $table->text('text')->nullable();
            $table->string('diploma')->nullable();
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
        Schema::dropIfExists('abiturientu_napravleniya_podgotovkis');
    }
}
