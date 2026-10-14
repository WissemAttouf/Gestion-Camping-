<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reservation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idvisiteurs');
            $table->integer('nbreplacetotale');
            $table->integer('idlieux');
            $table->integer('idservice');
            $table->integer('idguide');
            $table->string('payement');
            $table->date('datereservation');
            $table->string('etat');
            $table->string('nbreplacereserve');
            $table->string('nbreplacereste');

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
        Schema::dropIfExists('Reservation');
    }
}
