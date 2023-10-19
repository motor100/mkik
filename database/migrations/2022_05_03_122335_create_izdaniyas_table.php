<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIzdaniyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izdaniyas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('text')->nullable();
            $table->string('slug')->unique();
            $table->string('author', 100)->nullable();
            $table->string('category')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('publishing')->nullable();
            $table->string('year', 4)->nullable();
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('izdaniyas');
    }
}
