<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DvdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dvds = [
            [
                'ian' => '1234567890123',
                'id_realisateur' => 1, // Assuming 'Steven Spielberg' has an ID of 1 in the 'realisateurs' table
                'genre' => 'Aventure',
                'titre' => 'Jurassic Park',
                'id_casting' => 1, // Assuming this casting exists with ID 1
                'annee' => 1993,
                'statut' => 'disponible',
                'nombre_exemplaires' => 5,
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
                'duree' => 127,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '1234567890123.jpg',
            ],
            [
                'ian' => '2345678901234',
                'id_realisateur' => 2, // Assuming 'Christopher Nolan' has an ID of 2 in the 'realisateurs' table
                'genre' => 'Science-fiction',
                'titre' => 'Inception',
                'id_casting' => 2, // Assuming this casting exists with ID 2
                'annee' => 2010,
                'statut' => 'disponible',
                'nombre_exemplaires' => 3,
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
                'duree' => 148,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '2345678901234.jpg',

            ],
            [
                'ian' => '3456789012345',
                'id_realisateur' => 3, // Assuming 'Martin Scorsese' has an ID of 3 in the 'realisateurs' table
                'genre' => 'Biographie',
                'titre' => 'The Wolf of Wall Street',
                'id_casting' => 3, // Assuming this casting exists with ID 3
                'annee' => 2013,
                'statut' => 'disponible',
                'nombre_exemplaires' => 4,
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
                'duree' => 180,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '3456789012345.jpg',
            ],
            [
                'ian' => '4567890123456',
                'id_realisateur' => 4, // Assuming 'Jean-Pierre Jeunet' has an ID of 4 in the 'realisateurs' table
                'genre' => 'Fantaisie',
                'titre' => 'Le Fabuleux Destin d\'Amélie Poulain',
                'id_casting' => 4, // Assuming this casting exists with ID 4
                'annee' => 2001,
                'statut' => 'disponible',
                'nombre_exemplaires' => 6,
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
                'duree' => 122,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '4567890123456.jpg',
            ],
            [
                'ian' => '5678901234567',
                'id_realisateur' => 5, // Assuming 'Quentin Tarantino' has an ID of 5 in the 'realisateurs' table
                'genre' => 'Thriller',
                'titre' => 'Pulp Fiction',
                'id_casting' => 5, // Assuming this casting exists with ID 5
                'annee' => 1994,
                'statut' => 'disponible',
                'nombre_exemplaires' => 7,
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
                'duree' => 154,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '5678901234567.jpg',
            ],
        ];

        // Insert data into the 'dvds' table
        DB::table('dvds')->insert($dvds);
    }
}
