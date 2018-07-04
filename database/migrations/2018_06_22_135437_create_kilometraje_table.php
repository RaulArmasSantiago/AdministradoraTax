<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKilometrajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kilometraje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kilometraje');
            $table->date('fecha_registro');
            $table->unsignedInteger('id_vehiculo');
            $table->foreign('id_vehiculo')->references('id')->on('vehiculos')->ondelete('cascade')->onupdate('cascade');
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
        Schema::dropIfExists('kilometraje');
    }
}
