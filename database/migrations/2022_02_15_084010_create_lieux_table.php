<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLieuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lieux', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Titre');
            $table->String('Description');
            $table->string('Photo');
            $table->string('Prix');
            $table->string('NbrPlaces');
            $table->string('Difficulte');
            $table->date('DateDebut');
            $table->date('DateFin');
            $table->string('Lat');
            $table->string('Lon');
            $table->string('Guide');
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
        Schema::dropIfExists('lieux');
    }
}
