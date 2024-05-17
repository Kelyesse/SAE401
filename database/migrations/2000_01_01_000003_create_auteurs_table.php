<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuteursTable extends Migration
{
    public function up()
    {
        Schema::create('auteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->text('bibliographie')->nullable();
            $table->unsignedBigInteger('id_nationalite');
            $table->foreign('id_nationalite')->references('id')->on('pays');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auteurs');
    }
}
