<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActeursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acteurs = [
            [
                'nom' => 'Depardieu',
                'prenom' => 'Gérard',
                'biographie' => 'Gérard Depardieu est un acteur français célèbre pour ses rôles dans "Cyrano de Bergerac" et "Jean de Florette".',
                'id_nationalite' => 1,
            ],
            [
                'nom' => 'Binoche',
                'prenom' => 'Juliette',
                'biographie' => 'Juliette Binoche est une actrice française primée connue pour ses rôles dans "Le Patient anglais" et "Chocolat".',
                'id_nationalite' => 1,
            ],
            [
                'nom' => 'Reno',
                'prenom' => 'Jean',
                'biographie' => 'Jean Reno est un acteur français célèbre pour ses rôles dans "Léon: The Professional" et "Le Grand Bleu".',
                'id_nationalite' => 1,
            ],
            [
                'nom' => 'Dujardin',
                'prenom' => 'Jean',
                'biographie' => 'Jean Dujardin est un acteur français connu pour son rôle dans "The Artist", pour lequel il a remporté un Oscar.',
                'id_nationalite' => 1,
            ],
            [
                'nom' => 'Huppert',
                'prenom' => 'Isabelle',
                'biographie' => 'Isabelle Huppert est une actrice française connue pour ses performances dans des films comme "Elle" et "La Pianiste".',
                'id_nationalite' => 1,
            ],
            [
                'nom' => 'DiCaprio',
                'prenom' => 'Leonardo',
                'biographie' => 'Leonardo DiCaprio est un acteur américain connu pour ses rôles dans "Titanic", "Inception", et "The Wolf of Wall Street".',
                'id_nationalite' => 2,
            ],
            [
                'nom' => 'Winslet',
                'prenom' => 'Kate',
                'biographie' => 'Kate Winslet est une actrice britannique célèbre pour ses rôles dans "Titanic", "The Reader", et "Eternal Sunshine of the Spotless Mind".',
                'id_nationalite' => 3,
            ],
            [
                'nom' => 'Pitt',
                'prenom' => 'Brad',
                'biographie' => 'Brad Pitt est un acteur américain célèbre pour ses rôles dans "Fight Club", "Se7en", et "Once Upon a Time in Hollywood".',
                'id_nationalite' => 2,
            ],
            [
                'nom' => 'Johansson',
                'prenom' => 'Scarlett',
                'biographie' => 'Scarlett Johansson est une actrice américaine connue pour ses rôles dans "Lost in Translation", "The Avengers", et "Marriage Story".',
                'id_nationalite' => 2,
            ],
            [
                'nom' => 'Oldman',
                'prenom' => 'Gary',
                'biographie' => 'Gary Oldman est un acteur britannique connu pour ses rôles dans "Dracula", "The Dark Knight", et "Darkest Hour".',
                'id_nationalite' => 3,
            ],
        ];

        // Insert data into the 'acteurs' table
        DB::table('acteurs')->insert($acteurs);
    }
}
