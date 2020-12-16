<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('demande_numero')->unique();
            $table->string('prenom');
            $table->string('nom');
            $table->string('email');
            $table->string('tel');
            $table->string('ville');
            $table->string('cin');
            $table->string('permis');
            $table->date('from');
            $table->date('to');
            $table->unsignedBigInteger('total');
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
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
        Schema::dropIfExists('demande_reservations');
    }
}
