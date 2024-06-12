<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LivresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $livres = [
            [
                'id_auteur' => 1, // Assuming 'J.K. Rowling' has an ID of 1 in the 'auteurs' table
                'isbn' => '9780747532743',
                'id_editeur' => 2, // Assuming 'Penguin Books' has an ID of 2 in the 'editeurs' table
                'titre' => 'Harry Potter à l\'école des sorciers',
                'genre' => 'Fantaisie',
                'nombre_pages' => 332,
                'annee' => 1997,
                'statut' => 'indisponible',
                'id_langue' => 2, // Assuming 'Anglais' has an ID of 2 in the 'langues' table
                'nombre_exemplaires' => 15,
                'maison_edition' => 'Penguin Books',
                'collection' => 'Harry Potter',
                'imgUrl' => '9780747532743.jpg',
                'description' => 'Harry Potter à l\'école des sorciers est le premier livre de la série Harry Potter, écrit par J.K. Rowling. Il raconte l\'histoire d\'un jeune sorcier nommé Harry Potter et de ses aventures à l\'école de sorcellerie de Poudlard. Là, Harry découvre qu\'il est le survivant d\'une attaque meurtrière par le sorcier maléfique Voldemort. Le livre suit Harry alors qu\'il apprend la magie, se fait des amis, et affronte le mal qui menace le monde sorcier. Avec son mélange de mystère, de magie, et d\'amitié, Harry Potter à l\'école des sorciers a captivé des millions de lecteurs à travers le monde.',
                'created_at' => $now,
                'updated_at' => $now
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
                'description' => 'Shining est un roman d\'horreur écrit par Stephen King. Il suit l\'histoire de Jack Torrance, un écrivain en difficulté qui devient gardien d\'un hôtel isolé, l\'Overlook Hotel, pendant l\'hiver. Alors que l\'hôtel devient de plus en plus sinistre et que les forces surnaturelles commencent à influencer Jack, sa femme Wendy et leur fils Danny, le passé hanté de l\'Overlook est révélé. Shining est acclamé pour sa tension psychologique, ses personnages complexes et son exploration des thèmes de la folie et de l\'isolement.',
                'created_at' => $now,
                'updated_at' => $now
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
                'description' => 'Murder on the Orient Express est un roman policier écrit par Agatha Christie. L\'histoire se déroule à bord du célèbre train Orient Express, où le détective Hercule Poirot se retrouve par hasard alors qu\'il voyage en Europe. Lorsqu\'un meurtre est commis dans le train, Poirot est chargé de résoudre le mystère, en interrogeant les passagers et en rassemblant des indices. Le roman est salué pour son intrigue captivante, ses rebondissements inattendus et son ambiance claustrophobique à bord du train. Murder on the Orient Express est devenu l\'un des romans les plus célèbres d\'Agatha Christie et a été adapté de nombreuses',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        // Insert data into the 'livres' table
        DB::table('livres')->insert($livres);
    }
}
