<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notes = [
            [
                'id_utilisateur' => 1, // Assuming user with ID 1 exists
                'id_livre' => 1, // Assuming book with ID 1 exists
                'id_dvd' => null,
                'type_ressource' => 'livre',
                'note' => 4.5,
                'commentaire' => 'Très bon livre, j\'ai adoré!',
                'date_note' => '2024-06-05', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 2, // Assuming user with ID 2 exists
                'id_livre' => null,
                'id_dvd' => 1, // Assuming DVD with ID 1 exists
                'type_ressource' => 'dvd',
                'note' => 3.8,
                'commentaire' => 'Un bon film mais la fin était prévisible.',
                'date_note' => '2024-06-10', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 3, // Assuming user with ID 3 exists
                'id_livre' => 2, // Assuming book with ID 2 exists
                'id_dvd' => null,
                'type_ressource' => 'livre',
                'note' => 4.2,
                'commentaire' => 'Un scénario fascinant et des effets spéciaux incroyables!',
                'date_note' => '2024-06-12', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 4, // Assuming user with ID 4 exists
                'id_livre' => null,
                'id_dvd' => 3, // Assuming DVD with ID 3 exists
                'type_ressource' => 'dvd',
                'note' => 4.7,
                'commentaire' => 'Un film captivant qui offre un regard fascinant sur le monde de la finance.',
                'date_note' => '2024-06-14', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 5, // Assuming user with ID 5 exists
                'id_livre' => 4, // Assuming book with ID 4 exists
                'id_dvd' => null,
                'type_ressource' => 'livre',
                'note' => 4.9,
                'commentaire' => 'Une histoire charmante et poétique qui m\'a vraiment touché.',
                'date_note' => '2024-06-16', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 6, // Assuming user with ID 6 exists
                'id_livre' => null,
                'id_dvd' => 4, // Assuming DVD with ID 4 exists
                'type_ressource' => 'dvd',
                'note' => 4.6,
                'commentaire' => 'Un classique du cinéma avec des performances incroyables!',
                'date_note' => '2024-06-18', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 7, // Assuming user with ID 7 exists
                'id_livre' => 5, // Assuming book with ID 5 exists
                'id_dvd' => null,
                'type_ressource' => 'livre',
                'note' => 4.3,
                'commentaire' => 'Des scènes d\'action à couper le souffle et une histoire palpitante!',
                'date_note' => '2024-06-20', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 7, // Assuming user with ID 7 exists
                'id_livre' => 1, // Assuming book with ID 5 exists
                'id_dvd' => null,
                'type_ressource' => 'livre',
                'note' => 3.3,
                'commentaire' => 'Des scènes d\'action à couper le souffle et une histoire palpitante!',
                'date_note' => '2024-06-20', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 8, // Assuming user with ID 8 exists
                'id_livre' => null,
                'id_dvd' => 5, // Assuming DVD with ID 5 exists
                'type_ressource' => 'dvd',
                'note' => 4.8,
                'commentaire' => 'Un film émouvant qui capture vraiment l\'esprit de son époque.',
                'date_note' => '2024-06-22', // Assuming the date of the note
            ],
            [
                'id_utilisateur' => 8, // Assuming user with ID 8 exists
                'id_livre' => null,
                'id_dvd' => 3, // Assuming DVD with ID 5 exists
                'type_ressource' => 'dvd',
                'note' => 2.8,
                'commentaire' => 'Un film émouvant qui capture vraiment l\'esprit de son époque.',
                'date_note' => '2024-06-22', // Assuming the date of the note
            ],
            // Add more examples as needed
        ];

        // Insert data into the 'note' table
        DB::table('note')->insert($notes);
    }
}
