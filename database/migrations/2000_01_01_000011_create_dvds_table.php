<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvds', function (Blueprint $table) {
            $table->id();
            $table->string('ian');
            $table->unsignedBigInteger('id_realisateur');
            $table->enum('genre', ['Romance', 'Science-fiction', 'Mystère', 'Thriller', 'Fantaisie', 'Aventure', 'Horreur', 'Dystopie', 'Humour', 'Jeunesse', 'Biographie', 'Histoire', 'Sciences naturelles', 'Sciences sociales', 'Psychologie', 'Économie', 'Politique', 'Religion']);
            $table->string('titre');
            $table->unsignedBigInteger('id_casting');
            $table->year('annee');
            $table->enum('statut', ['disponible', 'indisponible']);
            $table->integer('nombre_exemplaires');
            $table->unsignedBigInteger('id_langue');
            $table->integer('duree');
            $table->string('sous_titres');
            $table->string('imgUrl');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('id_realisateur')->references('id')->on('realisateurs');
            $table->foreign('id_casting')->references('id')->on('castings');
            $table->foreign('id_langue')->references('id')->on('langues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dvds');
    }
}
