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
            [
                'nom' => 'Legrand',
                'prenom' => 'Alice',
                'email' => 'alice.legrand@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '60 Avenue de la République',
                'ville' => 'Lyon',
                'code_postal' => '69001',
                'complement' => '',
                'type_utilisateur' => 'utilisateur',
            ],
            [
                'nom' => 'Girard',
                'prenom' => 'Thomas',
                'email' => 'thomas.girard@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '70 Rue du Faubourg Saint-Honoré',
                'ville' => 'Marseille',
                'code_postal' => '13001',
                'complement' => 'Appartement 2C',
                'type_utilisateur' => 'utilisateur',
            ],
            [
                'nom' => 'Lecomte',
                'prenom' => 'Emma',
                'email' => 'emma.lecomte@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '80 Boulevard Haussmann',
                'ville' => 'Bordeaux',
                'code_postal' => '33000',
                'complement' => 'Bâtiment B',
                'type_utilisateur' => 'utilisateur',
            ],
            [
                'nom' => 'Fournier',
                'prenom' => 'Lucas',
                'email' => 'lucas.fournier@example.com',
                'mot_de_passe' => Hash::make('password123'),
                'adresse' => '90 Avenue Victor Hugo',
                'ville' => 'Lille',
                'code_postal' => '59000',
                'complement' => '',
                'type_utilisateur' => 'utilisateur',
            ],
        ];

        // Insert data into the 'utilisateurs' table
        DB::table('utilisateurs')->insert($utilisateurs);
    }
}
