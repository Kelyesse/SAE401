<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DVDLanguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dvd_langues = [
            [
                'id_dvd' => 1, // Assuming DVD with ID 1 exists
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
            ],
            [
                'id_dvd' => 1, // Assuming DVD with ID 1 exists
                'id_langue' => 2, // Assuming 'Anglais' has an ID of 2 in the 'langues' table
            ],
            [
                'id_dvd' => 2, // Assuming DVD with ID 2 exists
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
            ],
            [
                'id_dvd' => 2, // Assuming DVD with ID 2 exists
                'id_langue' => 3, // Assuming 'Espagnol' has an ID of 3 in the 'langues' table
            ],
            [
                'id_dvd' => 3, // Assuming DVD with ID 3 exists
                'id_langue' => 1, // Assuming 'Français' has an ID of 1 in the 'langues' table
            ],
        ];

        // Insert data into the 'dvd_langues' table
        DB::table('dvd_langues')->insert($dvd_langues);
    }
}
