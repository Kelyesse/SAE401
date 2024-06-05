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
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Binoche',
                'prenom' => 'Juliette',
                'biographie' => 'Juliette Binoche est une actrice française primée connue pour ses rôles dans "Le Patient anglais" et "Chocolat".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Reno',
                'prenom' => 'Jean',
                'biographie' => 'Jean Reno est un acteur français célèbre pour ses rôles dans "Léon: The Professional" et "Le Grand Bleu".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Dujardin',
                'prenom' => 'Jean',
                'biographie' => 'Jean Dujardin est un acteur français connu pour son rôle dans "The Artist", pour lequel il a remporté un Oscar.',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Huppert',
                'prenom' => 'Isabelle',
                'biographie' => 'Isabelle Huppert est une actrice française connue pour ses performances dans des films comme "Elle" et "La Pianiste".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
        ];

        // Insert data into the 'acteurs' table
        DB::table('acteurs')->insert($acteurs);
    }
}
