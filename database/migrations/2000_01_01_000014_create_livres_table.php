<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_auteur');
            $table->string('isbn');
            $table->unsignedBigInteger('id_editeur');
            $table->string('titre');
            $table->enum('genre', ['Romance', 'Science-fiction', 'Mystère', 'Thriller', 'Fantaisie', 'Aventure', 'Horreur', 'Dystopie', 'Humour', 'Jeunesse', 'Biographie', 'Histoire', 'Sciences naturelles', 'Sciences sociales', 'Psychologie', 'Économie', 'Politique', 'Religion']);
            $table->integer('nombre_pages');
            $table->year('annee');
            $table->enum('statut', ['disponible', 'indisponible']);
            $table->unsignedBigInteger('id_langue');
            $table->integer('nombre_exemplaires');
            $table->string('maison_edition');
            $table->string('collection');
            $table->string('imgUrl');
            $table->text('description');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('id_auteur')->references('id')->on('auteurs');
            $table->foreign('id_editeur')->references('id')->on('editeurs');
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
        Schema::dropIfExists('livres');
    }
}
