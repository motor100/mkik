<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodicheskieRekomendaciisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prepodavatelyam_metodicheskie_rekomendaciis', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->string('filetype');
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
        Schema::dropIfExists('metodicheskie-rekomendaciis');
    }
}
