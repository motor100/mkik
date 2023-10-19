<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfishasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afishas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('text')->nullable();
            $table->string('slug')->unique();
            $table->string('year');
            $table->string('date');
            $table->string('place')->nullable();
            $table->string('address')->nullable();
            $table->string('price')->nullable();
            $table->integer('time_hour')->nullable();
            $table->integer('time_min')->nullable();
            $table->string('remark')->nullable();
            $table->string('preview')->nullable();
            $table->string('zal')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afishas');
    }
}
