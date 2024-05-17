<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActeursTable extends Migration
{
    public function up()
    {
        Schema::create('acteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->text('biographie')->nullable();
            $table->unsignedBigInteger('id_nationalite');
            $table->foreign('id_nationalite')->references('id')->on('pays');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acteurs');
    }
}
