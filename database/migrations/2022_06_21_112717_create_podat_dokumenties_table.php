<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodatDokumentiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podat_dokumenties', function (Blueprint $table) {
            $table->id();
            $table->string('surname', 100);
            $table->string('name', 100);
            $table->string('patronymic', 100);
            $table->string('birth_date', 10);
            $table->string('phone', 16);
            $table->string('email', 40);
            $table->string('attestat', 200);
            $table->string('passport', 200);
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
        Schema::dropIfExists('podat_dokumenties');
    }
}
