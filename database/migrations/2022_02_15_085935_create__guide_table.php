<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Guide', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('experience');
            $table->string('datedenaissance');
            $table->string('specialite');
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
        Schema::dropIfExists('Guide');
    }
}
