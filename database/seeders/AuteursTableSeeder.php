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
            [
                'nom' => 'Saint-Exupéry',
                'prenom' => 'Antoine de',
                'bibliographie' => 'Antoine de Saint-Exupéry était un écrivain, poète et aviateur français, surtout connu pour son œuvre "Le Petit Prince".',
                'id_nationalite' => 1, // Assuming 'France' has an ID of 1 in the 'pays' table
            ],
            [
                'nom' => 'Austen',
                'prenom' => 'Jane',
                'bibliographie' => 'Jane Austen était une romancière anglaise connue pour ses œuvres comme "Orgueil et Préjugés" et "Emma".',
                'id_nationalite' => 3, // Assuming 'United Kingdom' has an ID of 3 in the 'pays' table
            ],
            [
                'nom' => 'Rowling',
                'prenom' => 'J.K.',
                'bibliographie' => 'J.K. Rowling est une écrivaine britannique célèbre pour la série de livres "Harry Potter".',
                'id_nationalite' => 3, // Assuming 'United Kingdom' has an ID of 3 in the 'pays' table
            ],
            [
                'nom' => 'Tolkien',
                'prenom' => 'J.R.R.',
                'bibliographie' => 'J.R.R. Tolkien était un écrivain et professeur britannique, célèbre pour ses œuvres "Le Seigneur des anneaux" et "Le Hobbit".',
                'id_nationalite' => 3, // Assuming 'United Kingdom' has an ID of 3 in the 'pays' table
            ],
            [
                'nom' => 'Orwell',
                'prenom' => 'George',
                'bibliographie' => 'George Orwell était un écrivain et journaliste britannique, connu pour ses romans "1984" et "La Ferme des animaux".',
                'id_nationalite' => 3, // Assuming 'United Kingdom' has an ID of 3 in the 'pays' table
            ],
            [
                'nom' => 'Hemingway',
                'prenom' => 'Ernest',
                'bibliographie' => 'Ernest Hemingway était un écrivain américain, auteur de romans tels que "Le Vieil Homme et la Mer" et "Pour qui sonne le glas".',
                'id_nationalite' => 2, // Assuming 'United States' has an ID of 2 in the 'pays' table
            ],
            [
                'nom' => 'Fitzgerald',
                'prenom' => 'F. Scott',
                'bibliographie' => 'F. Scott Fitzgerald était un écrivain américain connu pour son roman "Gatsby le Magnifique".',
                'id_nationalite' => 2, // Assuming 'United States' has an ID of 2 in the 'pays' table
            ],
        ];

        // Insert data into the 'auteurs' table
        DB::table('auteurs')->insert($auteurs);
    }
}
