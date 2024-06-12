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
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ian' => '5678901234567',
                'id_realisateur' => 5, // Assuming 'Quentin Tarantino' has an ID of 5 in the 'realisateurs' table
                'genre' => 'Thriller',
                'titre' => 'Pulp Fiction',
                'id_casting' => 5, // Assuming this casting exists avec ID 5
                'annee' => 1994,
                'statut' => 'disponible',
                'nombre_exemplaires' => 7,
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
                'duree' => 154,
                'sous_titres' => 'Français, Anglais',
                'imgUrl' => '5678901234567.jpg',
                'description' => 'Pulp Fiction est un film culte réalisé par Quentin Tarantino. Il se compose de plusieurs récits entrecroisés impliquant des personnages comme des gangsters, un boxeur, et une femme fatale. Le film est connu pour son dialogue vif, son humour noir, et sa structure narrative non linéaire. John Travolta, Samuel L. Jackson, et Uma Thurman offrent des performances mémorables. Pulp Fiction a revitalisé la carrière de Travolta et a cimenté Tarantino comme l\'un des réalisateurs les plus influents de sa génération.',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        // Insert data into the 'dvds' table
        DB::table('dvds')->insert($dvds);
    }
}
