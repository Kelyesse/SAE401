<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $realisateurs = [
            [
                'nom' => 'Spielberg',
                'prenom' => 'Steven',
                'biographie' => 'Steven Spielberg est un réalisateur et producteur américain, connu pour des films comme "Jurassic Park" et "E.T.".',
                'id_nationalite' => 2, // Assuming 'United States' has an ID of 2 in the 'pays' table
            ],
            [
                'nom' => 'Scorsese',
                'prenom' => 'Martin',
                'biographie' => 'Martin Scorsese est un réalisateur américain réputé pour ses films comme "Taxi Driver" et "Goodfellas".',
                'id_nationalite' => 2, // Assuming 'United States' has an ID of 2 in the 'pays' table
            ],
            [
                'nom' => 'Nolan',
                'prenom' => 'Christopher',
                'biographie' => 'Christopher Nolan est un réalisateur britannique connu pour ses films comme "Inception" et "The Dark Knight".',
                'id_nationalite' => 3, // Assuming 'United Kingdom' has an ID of 3 in the 'pays' table
            ],
            [
                'nom' => 'Jeunet',
                'prenom' => 'Jean-Pierre',
                'biographie' => 'Jean-Pierre Jeunet est un réalisateur français connu pour ses films "Le Fabuleux Destin d\'Amélie Poulain" et "Delicatessen".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Tarantino',
                'prenom' => 'Quentin',
                'biographie' => 'Quentin Tarantino est un réalisateur américain célèbre pour ses films comme "Pulp Fiction" et "Kill Bill".',
                'id_nationalite' => 2, // Assuming 'United States' has an ID of 2 in the 'pays' table
            ],
            [
                'nom' => 'Miller',
                'prenom' => 'George',
                'biographie' => 'George Miller est un réalisateur australien connu pour ses films "Mad Max" et "Happy Feet".',
                'id_nationalite' => 4, // Assuming 'Australia' has an ID of 4 in the 'pays' table
            ],
            [
                'nom' => 'Zemeckis',
                'prenom' => 'Robert',
                'biographie' => 'Robert Zemeckis est un réalisateur américain connu pour ses films "Forrest Gump" et "Retour vers le futur".',
                'id_nationalite' => 2, // Assuming 'United States' has an ID of 2 in the 'pays' table
            ],
            [
                'nom' => 'Anderson',
                'prenom' => 'Wes',
                'biographie' => 'Wes Anderson est un réalisateur américain connu pour ses films "The Grand Budapest Hotel" et "Fantastic Mr. Fox".',
                'id_nationalite' => 2, // Assuming 'United States' has an ID of 2 in the 'pays' table
            ],
            [
                'nom' => 'Miyazaki',
                'prenom' => 'Hayao',
                'biographie' => 'Hayao Miyazaki est un réalisateur japonais connu pour ses films "Spirited Away" et "Mon voisin Totoro".',
                'id_nationalite' => 5, // Assuming 'Japan' has an ID of 5 in the 'pays' table
            ],
        ];

        // Insert data into the 'realisateurs' table
        DB::table('realisateurs')->insert($realisateurs);
    }
}
