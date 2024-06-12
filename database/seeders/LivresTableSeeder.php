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
                'imgUrl' => '9780747532743.jpg',
                'description' => 'Harry Potter à l\'école des sorciers est le premier livre de la série Harry Potter, écrit par J.K. Rowling. Il raconte l\'histoire d\'un jeune sorcier nommé Harry Potter et de ses aventures à l\'école de sorcellerie de Poudlard. Là, Harry découvre qu\'il est le survivant d\'une attaque meurtrière par le sorcier maléfique Voldemort. Le livre suit Harry alors qu\'il apprend la magie, se fait des amis, et affronte le mal qui menace le monde sorcier. Avec son mélange de mystère, de magie, et d\'amitié, Harry Potter à l\'école des sorciers a captivé des millions de lecteurs à travers le monde.',
                'created_at' => Carbon::parse('2024-06-30'),
                'updated_at' => Carbon::parse('2024-06-30')
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
                'imgUrl' => '9782253150712.jpg',
                'description' => 'Shining est un roman d\'horreur écrit par Stephen King. Il suit l\'histoire de Jack Torrance, un écrivain en difficulté qui devient gardien d\'un hôtel isolé, l\'Overlook Hotel, pendant l\'hiver. Alors que l\'hôtel devient de plus en plus sinistre et que les forces surnaturelles commencent à influencer Jack, sa femme Wendy et leur fils Danny, le passé hanté de l\'Overlook est révélé. Shining est acclamé pour sa tension psychologique, ses personnages complexes et son exploration des thèmes de la folie et de l\'isolement.',
                'created_at' => Carbon::parse('2024-03-02'),
                'updated_at' => Carbon::parse('2024-03-02')
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
                'imgUrl' => '9780007119318.jpg',
                'description' => 'Murder on the Orient Express est un roman policier écrit par Agatha Christie. L\'histoire se déroule à bord du célèbre train Orient Express, où le détective Hercule Poirot se retrouve par hasard alors qu\'il voyage en Europe. Lorsqu\'un meurtre est commis dans le train, Poirot est chargé de résoudre le mystère, en interrogeant les passagers et en rassemblant des indices. Le roman est salué pour son intrigue captivante, ses rebondissements inattendus et son ambiance claustrophobique à bord du train. Murder on the Orient Express est devenu l\'un des romans les plus célèbres d\'Agatha Christie et a été adapté de nombreuses',
                'created_at' => Carbon::parse('2024-06-04'),
                'updated_at' => Carbon::parse('2024-06-04')
            ],
            [
                'id_auteur' => 1,
                'isbn' => '9782070612368',
                'id_editeur' => 2,
                'titre' => 'Le Petit Prince',
                'genre' => 'Fantaisie',
                'nombre_pages' => 93,
                'annee' => 1943,
                'statut' => 'disponible',
                'id_langue' => 1,
                'nombre_exemplaires' => 20,
                'imgUrl' => '9782070612368.jpg',
                'description' => 'Le Petit Prince est un conte philosophique et poétique, qui raconte les aventures d\'un jeune prince venu d\'un autre monde. Écrit par Antoine de Saint-Exupéry, le livre explore des thèmes de l\'amour, de la perte, de l\'amitié, et de la beauté de la vie à travers les yeux innocents du petit prince. Chaque rencontre du prince est une allégorie et offre une leçon de vie aux lecteurs de tous âges.',
                'created_at' => Carbon::parse('2024-06-22'),
                'updated_at' => Carbon::parse('2024-06-2')
            ],
            [
                'id_auteur' => 2,
                'isbn' => '9780140440106',
                'id_editeur' => 3,
                'titre' => 'Orgueil et Préjugés',
                'genre' => 'Histoire',
                'nombre_pages' => 279,
                'annee' => 1950,
                'statut' => 'disponible',
                'id_langue' => 1,
                'nombre_exemplaires' => 15,
                'description' => 'Orgueil et Préjugés est un roman écrit par Jane Austen qui explore les mœurs et les relations sociales de l\'Angleterre du début du XIXe siècle. L\'histoire suit Elizabeth Bennet, l\'une des cinq filles d\'une famille de la petite noblesse rurale, et sa relation complexe avec le riche et réservé M. Darcy. À travers des intrigues amoureuses et des quiproquos, le roman aborde des thèmes tels que l\'orgueil, les préjugés, la classe sociale et le mariage.',
                'imgUrl' => '9780140440106.jpg',
                'created_at' => Carbon::parse('2024-06-01'),
                'updated_at' => Carbon::parse('2024-06-01'),
            ],
            [
                'id_auteur' => 3,
                'isbn' => '9782070408504',
                'id_editeur' => 4,
                'titre' => 'Les Misérables',
                'genre' => 'Drame',
                'nombre_pages' => 1987,
                'annee' => 1922,
                'statut' => 'disponible',
                'id_langue' => 1,
                'nombre_exemplaires' => 12,
                'description' => 'Les Misérables, écrit par Victor Hugo, est un roman historique qui se déroule dans la France du XIXe siècle. Il suit les vies entrecroisées de plusieurs personnages, notamment Jean Valjean, un ancien forçat, et l\'inspecteur Javert, qui le poursuit sans relâche. Le roman explore des thèmes de justice, de rédemption, de lutte contre la pauvreté et de sacrifice.',
                'imgUrl' => '9782070408504.jpg',
                'created_at' => Carbon::parse('2024-07-01'),
                'updated_at' => Carbon::parse('2024-07-01'),
            ],
            [
                'id_auteur' => 4,
                'isbn' => '9781400033416',
                'id_editeur' => 5,
                'titre' => '1984',
                'genre' => 'Science-fiction',
                'nombre_pages' => 328,
                'annee' => 1949,
                'statut' => 'disponible',
                'id_langue' => 1,
                'nombre_exemplaires' => 18,
                'description' => '1984 est un roman dystopique écrit par George Orwell. Il décrit une société totalitaire dirigée par le Parti et son chef, Big Brother. Le protagoniste, Winston Smith, travaille au ministère de la Vérité, où il falsifie des documents historiques. Le livre explore les thèmes de la surveillance, de la propagande, de la répression et de la manipulation de la vérité.',
                'imgUrl' => '9781400033416.jpg',
                'created_at' => Carbon::parse('2024-06-01'),
                'updated_at' => Carbon::parse('2024-06-01'),
            ],
            [
                'id_auteur' => 5,
                'isbn' => '9780307272119',
                'id_editeur' => 1,
                'titre' => 'Le Chardonneret',
                'genre' => 'Drame',
                'nombre_pages' => 864,
                'annee' => 2013,
                'statut' => 'disponible',
                'id_langue' => 1,
                'nombre_exemplaires' => 25,
                'description' => 'Le Chardonneret, écrit par Donna Tartt, est un roman qui suit la vie de Theo Decker, un garçon de treize ans dont la mère meurt dans un attentat au Metropolitan Museum of Art. Le roman explore ses luttes avec la perte, la culpabilité et la dépression, ainsi que son lien avec un tableau célèbre, "Le Chardonneret", qu\'il a sauvé de l\'attentat.',
                'imgUrl' => '9780307272119.jpg',
                'created_at' => Carbon::parse('2024-06-01'),
                'updated_at' => Carbon::parse('2024-06-01'),
            ],
            [
                'id_auteur' => 6,
                'isbn' => '9782070449781',
                'id_editeur' => 2,
                'titre' => 'L\'Étranger',
                'genre' => 'Aventure',
                'nombre_pages' => 123,
                'annee' => 1942,
                'statut' => 'disponible',
                'id_langue' => 1,
                'nombre_exemplaires' => 30,
                'description' => 'L\'Étranger, écrit par Albert Camus, est un roman existentialiste qui raconte l\'histoire de Meursault, un homme émotionnellement détaché qui vit en Algérie française. Après avoir commis un meurtre apparemment absurde, il est jugé non seulement pour son crime, mais aussi pour son indifférence et son manque de sentiment. Le roman explore des thèmes de l\'absurdité de la vie, de la mort et de l\'isolement.',
                'imgUrl' => '9782070449781.jpg',
                'created_at' => Carbon::parse('2024-06-03'),
                'updated_at' => Carbon::parse('2024-06-03'),
            ],
            [
                'id_auteur' => 7,
                'isbn' => '9782253009107',
                'id_editeur' => 3,
                'titre' => 'Le Parfum',
                'genre' => 'Fantaisie',
                'nombre_pages' => 255,
                'annee' => 1985,
                'statut' => 'disponible',
                'id_langue' => 1,
                'nombre_exemplaires' => 22,
                'description' => 'Le Parfum, écrit par Patrick Süskind, raconte l\'histoire de Jean-Baptiste Grenouille, un homme né avec un sens de l\'odorat exceptionnel. Grenouille devient obsédé par la création du parfum parfait, allant jusqu\'à commettre des meurtres pour obtenir les essences nécessaires. Le roman explore des thèmes de l\'obsession, de la beauté et de la dépravation.',
                'imgUrl' => '9782253009107.jpg',
                'created_at' => Carbon::parse('2024-06-11'),
                'updated_at' => Carbon::parse('2024-06-11'),
            ],
        ];

        // Insert data into the 'livres' table
        DB::table('livres')->insert($livres);
    }
}
