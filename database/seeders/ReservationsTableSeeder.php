<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = [
            [
                'id_utilisateur' => 1, // Assuming user with ID 1 exists
                'id_livre' => 1, // Assuming book with ID 1 exists
                'id_dvd' => null,
                'type_ressource' => 'livre',
                'date_debut' => '2024-06-05', // Start date of the reservation
                'date_retour_prevue' => '2024-06-15', // Expected return date
                'statut' => 'en attente',
            ],
            [
                'id_utilisateur' => 2, // Assuming user with ID 2 exists
                'id_livre' => null,
                'id_dvd' => 1, // Assuming DVD with ID 1 exists
                'type_ressource' => 'dvd',
                'date_debut' => '2024-06-10', // Start date of the reservation
                'date_retour_prevue' => '2024-06-20', // Expected return date
                'statut' => 'confirmé',
            ],
            // Add more examples as needed
        ];

        // Insert data into the 'reservations' table
        DB::table('reservations')->insert($reservations);
    }
}
