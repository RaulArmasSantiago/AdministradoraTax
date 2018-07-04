<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_accidente');
            $table->string('descripcion');
            $table->boolean('status')->default(true);
            $table->unsignedInteger('id_concesion');
            $table->foreign('id_concesion')->references('id')->on('concesiones')->ondelete('cascade')->onupdate('cascade');
            $table->unsignedInteger('id_conductor');
            $table->foreign('id_conductor')->references('id')->on('conductores')->ondelete('cascade')->onupdate('cascade');
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
        Schema::dropIfExists('reportes');
    }
}
