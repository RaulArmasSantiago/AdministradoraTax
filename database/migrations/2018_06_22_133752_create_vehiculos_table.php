<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca');
            $table->string('modelo');
            $table->string('año_fabricacion');
            $table->string('placa');
            $table->string('fotovehiculofrente');
            $table->string('fotovehiculold');
            $table->string('fotovehiculoli');
            $table->string('fotovehiculotrasera');
            $table->string('fotoseguro');
            $table->string('fototarjeta');
            $table->unsignedInteger('id_taximentro');
            $table->foreign('id_taximentro')->references('id')->on('taximetros')->ondelete('cascade')->onupdate('cascade');
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
        Schema::dropIfExists('vehiculos');
    }
}
