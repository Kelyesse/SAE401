<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuteursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auteurs = [
            [
                'nom' => 'Hugo',
                'prenom' => 'Victor',
                'bibliographie' => 'Victor Hugo est un écrivain français, célèbre pour ses romans "Les Misérables" et "Notre-Dame de Paris".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Camus',
                'prenom' => 'Albert',
                'bibliographie' => 'Albert Camus était un philosophe et écrivain français, connu pour "L\'Étranger" et "La Peste".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Zola',
                'prenom' => 'Émile',
                'bibliographie' => 'Émile Zola était un écrivain français, fondateur du naturalisme, connu pour "Germinal" et "Thérèse Raquin".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Sartre',
                'prenom' => 'Jean-Paul',
                'bibliographie' => 'Jean-Paul Sartre était un philosophe, dramaturge et romancier français, célèbre pour "La Nausée" et "Les Mains sales".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Duras',
                'prenom' => 'Marguerite',
                'bibliographie' => 'Marguerite Duras était une écrivain, scénariste et réalisatrice française, connue pour "L\'Amant" et "Hiroshima mon amour".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
        ];

        // Insert data into the 'auteurs' table
        DB::table('auteurs')->insert($auteurs);
    }
}
