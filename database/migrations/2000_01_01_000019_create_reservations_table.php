<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_utilisateur');
            $table->unsignedBigInteger('id_livre');
            $table->unsignedBigInteger('id_dvd');
            $table->enum('type_ressource', ['livre', 'dvd']);
            $table->date('date_debut');
            $table->date('date_retour_prevue');
            $table->string('statut', 20);
            $table->timestamps();



            $table->foreign('id_livre')->references('id')->on('livres')->where('type_ressource', 'livre');
            $table->foreign('id_dvd')->references('id')->on('dvds')->where('type_ressource', 'dvd');
            $table->foreign('id_utilisateur')->references('id')->on('utilisateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
