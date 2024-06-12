<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastingTable extends Migration
{
    public function up()
    {
        Schema::create('castings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_acteur');
            $table->unsignedBigInteger('id_dvd');
            $table->timestamps();

            $table->foreign('id_acteur')->references('id')->on('acteurs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('castings');
    }
}
