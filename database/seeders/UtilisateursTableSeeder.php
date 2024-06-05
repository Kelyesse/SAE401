<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilisateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $utilisateurs = [
            [
                'nom' => 'Dupont',
                'prenom' => 'Jean',
                'email' => 'jean.dupont@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '10 Rue de la Paix',
                'ville' => 'Paris',
                'code_postal' => '75001',
                'complement' => 'Appartement 5B',
                'type_utilisateur' => 'utilisateur',
            ],
            [
                'nom' => 'Martin',
                'prenom' => 'Sophie',
                'email' => 'sophie.martin@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '20 Avenue des Champs-Élysées',
                'ville' => 'Paris',
                'code_postal' => '75008',
                'complement' => 'Bâtiment A',
                'type_utilisateur' => 'utilisateur',
            ],
            [
                'nom' => 'Lefevre',
                'prenom' => 'Paul',
                'email' => 'paul.lefevre@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '30 Boulevard Saint-Germain',
                'ville' => 'Paris',
                'code_postal' => '75005',
                'complement' => '',
                'type_utilisateur' => 'bibliothecaire',
            ],
            [
                'nom' => 'Moreau',
                'prenom' => 'Marie',
                'email' => 'marie.moreau@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '40 Rue de Rivoli',
                'ville' => 'Paris',
                'code_postal' => '75004',
                'complement' => '',
                'type_utilisateur' => 'admin',
            ],
            [
                'nom' => 'Roux',
                'prenom' => 'Julien',
                'email' => 'julien.roux@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '50 Quai de la Seine',
                'ville' => 'Paris',
                'code_postal' => '75019',
                'complement' => 'Rez-de-chaussée',
                'type_utilisateur' => 'utilisateur',
            ],
        ];

        // Insert data into the 'utilisateurs' table
        DB::table('utilisateurs')->insert($utilisateurs);
    }
}
