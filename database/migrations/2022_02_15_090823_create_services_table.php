<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('description');
             $table->string('activites');
            $table->string('lieux');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->string('photo4');
            $table->string('menu');
            $table->string('email');
            $table->integer ('telephone');
            $table->string ('livraison');
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
        Schema::dropIfExists('services');
    }
}
