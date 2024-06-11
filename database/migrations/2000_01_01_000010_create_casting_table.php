<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCastingsTable extends Migration
{
    public function up()
    {
        Schema::create('castings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_acteur');
            $table->unsignedBigInteger('id_dvd');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('id_acteur')->references('id')->on('acteurs')->onDelete('cascade');
            $table->foreign('id_dvd')->references('id')->on('dvds')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('castings');
    }
}
