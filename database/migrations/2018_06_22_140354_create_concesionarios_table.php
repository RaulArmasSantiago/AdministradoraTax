<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcesionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concesionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreconcesionario');
            $table->string('domicilioconcesionario');
            $table->string('numExtconcesionario')->nullable();
            $table->string('numIntconcesionario')->nullable();
            $table->string('estadoconcesionario');
            $table->string('municipioconcesionario');
            $table->string('coloniaconcesionario')->nullable();
            $table->string('cpconcesionario')->nullable();
            $table->string('emailconcesionario');
            $table->string('telefonoconcesionario');
            $table->string('celularconcesionario');
            $table->string('celularconcesionario2');
            $table->string('fotoconcesionario');
            $table->string('ineconcesionario');
            $table->string('licenciaconcesionario');
            $table->boolean('statusconcesionario')->default(true);
            $table->timestamps();
            $table->unique(['nombreconcesionario','emailconcesionario']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concesionarios');
    }
}
