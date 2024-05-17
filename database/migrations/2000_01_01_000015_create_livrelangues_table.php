<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivreLanguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livre_langues', function (Blueprint $table) {
            $table->unsignedBigInteger('id_livre');
            $table->unsignedBigInteger('id_langue');

            // Clés étrangères
            $table->foreign('id_livre')->references('id')->on('livres');
            $table->foreign('id_langue')->references('id')->on('langues');

            // Clé primaire composite
            $table->primary(['id_livre', 'id_langue']);
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
        Schema::dropIfExists('livre_langues');
    }
}
