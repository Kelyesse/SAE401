<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DvdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
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
                'description' => 'Jurassic Park est un film d\'aventure réalisé par Steven Spielberg. Il raconte l\'histoire d\'un parc à thème où des dinosaures clonés sont ramenés à la vie grâce à des avancées scientifiques. Lorsque les systèmes de sécurité du parc échouent, les visiteurs doivent se battre pour leur survie contre ces créatures préhistoriques. Ce film a marqué le début d\'une franchise de plusieurs films et est connu pour ses effets spéciaux révolutionnaires et sa musique emblématique composée par John Williams.',
                'created_at' => $now,
                'updated_at' => $now
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
                'description' => 'Inception est un thriller de science-fiction réalisé par Christopher Nolan. Le film suit Dom Cobb, un voleur spécialisé dans l\'extraction d\'informations sensibles des rêves de ses cibles. Cobb est engagé pour une mission encore plus complexe : implanter une idée dans l\'esprit de quelqu\'un, un processus appelé "inception". Le film explore les profondeurs du subconscient humain à travers une série de rêves imbriqués, créant un monde visuel fascinant et complexe. Inception est acclamé pour son scénario innovant, ses effets spéciaux époustouflants et sa musique hypnotique composée par Hans Zimmer.',
                'created_at' => $now,
                'updated_at' => $now
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
                'description' => 'The Wolf of Wall Street est un film biographique réalisé par Martin Scorsese. Il est basé sur l\'histoire vraie de Jordan Belfort, un courtier en bourse de New York dont l\'entreprise, Stratton Oakmont, a pratiqué des fraudes massives. Le film dépeint la montée fulgurante et la chute vertigineuse de Belfort, ainsi que ses excès en matière de drogue, de sexe et de pouvoir. The Wolf of Wall Street est connu pour son ton provocateur et son interprétation charismatique par Leonardo DiCaprio dans le rôle principal. Il offre une critique acerbe du capitalisme et de la corruption financière.',
                'created_at' => $now,
                'updated_at' => $now
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
                'description' => 'Le Fabuleux Destin d\'Amélie Poulain est une comédie romantique fantaisiste réalisée par Jean-Pierre Jeunet. Le film raconte l\'histoire d\'Amélie, une jeune femme timide mais imaginative vivant à Montmartre. Après avoir trouvé une boîte à souvenirs cachée dans son appartement, Amélie décide de changer la vie de ceux qui l\'entourent de manière subtile et bienveillante. Le film est célèbre pour son esthétique colorée et poétique, sa musique envoûtante composée par Yann Tiersen, et la performance charmante d\'Audrey Tautou dans le rôle principal.',
                'created_at' => Carbon::parse('2024-06-01'),
                'updated_at' => Carbon::parse('2024-06-01')
            ],
            [
                'ian' => '5678901234567',
                'id_realisateur' => 5,
                'genre' => 'Thriller',
                'titre' => 'Pulp Fiction',
                'id_casting' => 5,
                'annee' => 1994,
                'statut' => 'disponible',
                'nombre_exemplaires' => 7,
                'id_langue' => 1,
                'duree' => 154,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '5678901234567.jpg',
                'description' => 'Pulp Fiction est un film culte réalisé par Quentin Tarantino. Il se compose de plusieurs récits entrecroisés impliquant des personnages comme des gangsters, un boxeur, et une femme fatale. Le film est connu pour son dialogue vif, son humour noir, et sa structure narrative non linéaire. John Travolta, Samuel L. Jackson, et Uma Thurman offrent des performances mémorables. Pulp Fiction a revitalisé la carrière de Travolta et a cimenté Tarantino comme l\'un des réalisateurs les plus influents de sa génération.',
                'created_at' => Carbon::parse('2024-06-01'),
                'updated_at' => Carbon::parse('2024-06-01')
            ],
            [
                'ian' => '6789012345678',
                'id_realisateur' => 6,
                'genre' => 'Action',
                'titre' => 'Mad Max: Fury Road',
                'id_casting' => 6,
                'annee' => 2015,
                'statut' => 'disponible',
                'nombre_exemplaires' => 6,
                'id_langue' => 1,
                'duree' => 120,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '6789012345678.jpg',
                'description' => 'Mad Max: Fury Road est un film d\'action post-apocalyptique réalisé par George Miller. Le film se déroule dans un désert aride où Max Rockatansky rejoint une rebelle, Furiosa, pour fuir un tyran sadique, Immortan Joe. Ce film est salué pour ses scènes d\'action spectaculaires, ses cascades impressionnantes, et ses effets visuels. Avec une esthétique unique et une narration visuelle intense, Mad Max: Fury Road a remporté plusieurs prix et est considéré comme l\'un des meilleurs films d\'action de tous les temps.',
                'created_at' => Carbon::parse('2024-12-05'),
                'updated_at' => Carbon::parse('2024-12-05')
            ],
            [
                'ian' => '7890123456789',
                'id_realisateur' => 7,
                'genre' => 'Fantaisie',
                'titre' => 'Forrest Gump',
                'id_casting' => 7,
                'annee' => 1994,
                'statut' => 'disponible',
                'nombre_exemplaires' => 4,
                'id_langue' => 1,
                'duree' => 142,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '7890123456789.jpg',
                'description' => 'Forrest Gump est un drame réalisé par Robert Zemeckis. Le film suit la vie de Forrest Gump, un homme simple mais au cœur pur, alors qu\'il traverse des décennies d\'événements historiques et personnels. De la guerre du Vietnam à la présidence de plusieurs États-Unis, Forrest vit des aventures extraordinaires tout en restant fidèle à son amour d\'enfance, Jenny. Le film est acclamé pour sa narration émotive, ses effets spéciaux novateurs et la performance inoubliable de Tom Hanks dans le rôle principal.',
                'created_at' => Carbon::parse('2024-02-10'),
                'updated_at' => Carbon::parse('2024-02-10')
            ],
            [
                'ian' => '8901234567890',
                'id_realisateur' => 8,
                'genre' => 'Humour',
                'titre' => 'The Grand Budapest Hotel',
                'id_casting' => 8,
                'annee' => 2014,
                'statut' => 'disponible',
                'nombre_exemplaires' => 3,
                'id_langue' => 1,
                'duree' => 99,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '8901234567890.jpg',
                'description' => 'The Grand Budapest Hotel est une comédie réalisée par Wes Anderson. Le film raconte les aventures de Gustave H, un concierge légendaire d\'un hôtel européen de l\'entre-deux-guerres, et de son protégé, Zero Moustafa. Lorsque Gustave est accusé de meurtre après l\'héritage d\'un tableau inestimable, il doit prouver son innocence tout en naviguant dans un monde de complots et de trahisons. Connu pour son style visuel distinctif, ses décors colorés, et son humour décalé, The Grand Budapest Hotel a remporté de nombreux prix et est considéré comme l\'un des meilleurs films d\'Anderson.',
                'created_at' => Carbon::parse('2024-06-18'),
                'updated_at' => Carbon::parse('2024-06-18')
            ],
            [
                'ian' => '9012345678901',
                'id_realisateur' => 9,
                'genre' => 'Science-fiction',
                'titre' => 'Interstellar',
                'id_casting' => 9,
                'annee' => 2014,
                'statut' => 'disponible',
                'nombre_exemplaires' => 5,
                'id_langue' => 1,
                'duree' => 169,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '9012345678901.jpg',
                'description' => 'Interstellar est un film de science-fiction réalisé par Christopher Nolan. L\'histoire se déroule dans un futur où la Terre est devenue inhabitable. Un groupe d\'astronautes, dirigé par Cooper, est envoyé à travers un trou de ver pour trouver une nouvelle planète habitable pour l\'humanité. Le film explore des thèmes complexes tels que l\'espace-temps, la relativité et l\'amour. Avec des effets spéciaux époustouflants, une bande sonore immersive composée par Hans Zimmer, et des performances puissantes de Matthew McConaughey et Anne Hathaway, Interstellar est acclamé comme un chef-d\'œuvre cinématographique.',
                'created_at' => Carbon::parse('2024-12-28'),
                'updated_at' => Carbon::parse('2024-12-28')
            ],
            [
                'ian' => '0123456789012',
                'id_realisateur' => 7,
                'genre' => 'Aventure',
                'titre' => 'Spirited Away',
                'id_casting' => 10,
                'annee' => 2001,
                'statut' => 'disponible',
                'nombre_exemplaires' => 8,
                'id_langue' => 1,
                'duree' => 125,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '0123456789012.jpg',
                'description' => 'Spirited Away est un film d\'animation japonais réalisé par Hayao Miyazaki. Le film raconte l\'histoire de Chihiro, une jeune fille qui se retrouve piégée dans un monde spirituel après que ses parents se sont transformés en cochons. Pour sauver ses parents et retourner dans le monde humain, Chihiro doit travailler dans un bain public dirigé par la sorcière Yubaba. Spirited Away est reconnu pour son imagination débordante, ses personnages mémorables, et son animation magnifique. Le film a remporté l\'Oscar du meilleur film d\'animation et est considéré comme l\'un des meilleurs films d\'animation jamais réalisés.',
                'created_at' => Carbon::parse('2024-06-01'),
                'updated_at' => Carbon::parse('2024-06-01')
            ],
        ];

        DB::table('dvds')->insert($dvds);
    }
}
