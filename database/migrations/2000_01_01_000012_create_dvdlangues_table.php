<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDVDLanguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvd_langues', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dvd');
            $table->unsignedBigInteger('id_langue');
            $table->timestamps();


            // Clés étrangères
            $table->foreign('id_dvd')->references('id')->on('dvds');
            $table->foreign('id_langue')->references('id')->on('langues');

            // Clé primaire composite
            $table->primary(['id_dvd', 'id_langue']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dvdlangues');
    }
}
