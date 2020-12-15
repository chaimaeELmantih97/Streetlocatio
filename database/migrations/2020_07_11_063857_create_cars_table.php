<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary');
            $table->longText('description')->nullable();
            $table->text('photo');
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->boolean('is_featured')->deault(false);
            $table->string('modele');
            $table->integer('annee_modele');
            $table->string('categorie');
            $table->string('carburant');
            $table->string('boite_vitesses');
            $table->integer('passagers')->nullable();
            $table->integer('portes')->nullable();
            $table->unsignedBigInteger('prix_location');
            $table->string('immatriculation');
            $table->unsignedTinyInteger('disponible');
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
        Schema::dropIfExists('cars');
    }
}
