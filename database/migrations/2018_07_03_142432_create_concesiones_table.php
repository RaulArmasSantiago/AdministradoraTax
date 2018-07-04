<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcesionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concesiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concesion');
            $table->unsignedInteger('id_vehiculo');
            $table->foreign('id_vehiculo')->references('id')->on('vehiculos')->ondelete('cascade')->onupdate('cascade');
            $table->unsignedInteger('id_concesionario');
            $table->foreign('id_concesionario')->references('id')->on('concesionarios')->ondelete('cascade')->onupdate('cascade');
            $table->unsignedInteger('id_conductor')->nullable();
            $table->foreign('id_conductor')->references('id')->on('conductores')->onupdate('cascade')->ondelete('cascade');
            $table->timestamps();
            $table->unique(['concesion','id_vehiculo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concesiones');
    }
}
