<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaximetrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taximetros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marcatax');
            $table->string('modelotax');
            $table->string('serietax');
            $table->string('idiot');
            $table->timestamps();
            $table->unique(['serietax','idiot']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taximetros');
    }
}
