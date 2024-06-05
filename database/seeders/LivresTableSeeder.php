<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $livres = [
            [
                'id_auteur' => 1, // Assuming 'J.K. Rowling' has an ID of 1 in the 'auteurs' table
                'isbn' => '9780747532743',
                'id_editeur' => 2, // Assuming 'Penguin Books' has an ID of 2 in the 'editeurs' table
                'titre' => 'Harry Potter à l\'école des sorciers',
                'genre' => 'Fantaisie',
                'nombre_pages' => 332,
                'annee' => 1997,
                'statut' => 'disponible',
                'id_langue' => 2, // Assuming 'Anglais' has an ID of 2 in the 'langues' table
                'nombre_exemplaires' => 15,
                'maison_edition' => 'Penguin Books',
                'collection' => 'Harry Potter',
                'imgUrl' => '9780747532743.jpg',
            ],
            [
                'id_auteur' => 2, // Assuming 'Stephen King' has an ID of 2 in the 'auteurs' table
                'isbn' => '9782253150712',
                'id_editeur' => 3, // Assuming 'Livre de Poche' has an ID of 3 in the 'editeurs' table
                'titre' => 'Shining',
                'genre' => 'Horreur',
                'nombre_pages' => 513,
                'annee' => 1977,
                'statut' => 'disponible',
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
                'nombre_exemplaires' => 10,
                'maison_edition' => 'Livre de Poche',
                'collection' => '',
                'imgUrl' => '9782253150712.jpg',
            ],
            [
                'id_auteur' => 3, // Assuming 'Agatha Christie' has an ID of 3 in the 'auteurs' table
                'isbn' => '9780007119318',
                'id_editeur' => 4, // Assuming 'HarperCollins' has an ID of 4 in the 'editeurs' table
                'titre' => 'Murder on the Orient Express',
                'genre' => 'Mystère',
                'nombre_pages' => 274,
                'annee' => 1934,
                'statut' => 'disponible',
                'id_langue' => 2, // Assuming 'Anglais' has an ID of 2 in the 'langues' table
                'nombre_exemplaires' => 8,
                'maison_edition' => 'HarperCollins',
                'collection' => '',
                'imgUrl' => '9780007119318.jpg',
            ],
        ];

        // Insert data into the 'livres' table
        DB::table('livres')->insert($livres);
    }
}
