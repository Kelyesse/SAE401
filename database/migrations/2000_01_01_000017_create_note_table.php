<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_utilisateur');
            $table->unsignedBigInteger('id_livre')->nullable();
            $table->unsignedBigInteger('id_dvd')->nullable();

            $table->enum('type_ressource', ['livre', 'dvd']);
            $table->decimal('note', 3, 1);
            $table->text('commentaire')->nullable();
            $table->date('date_note');
            $table->timestamps();


            $table->foreign('id_utilisateur')->references('id')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('id_livre')->references('id')->on('livres')->onDelete('cascade')->where('type_ressource', 'livre');
            $table->foreign('id_dvd')->references('id')->on('dvds')->onDelete('cascade')->where('type_ressource', 'dvd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notedvds');
    }
}
