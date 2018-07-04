<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreconductor');
            $table->string('domicilioconductor');
            $table->string('numExtconductor')->nullable();
            $table->string('numIntconductor')->nullable();
            $table->string('estadoconductor');
            $table->string('municipioconductor');
            $table->string('coloniaconductor')->nullable();
            $table->string('cpconductor')->nullable();
            $table->string('emailconductor');
            $table->string('telefonoconductor');
            $table->string('celularconductor');
            $table->string('celularconductor2');
            $table->string('fotoconductor');
            $table->string('ineconductor');
            $table->string('licenciaconductor');
            $table->boolean('statusconductor')->default(true);
            $table->timestamps();
            $table->unique(['nombreconductor','emailconductor']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conductores');
    }
}
