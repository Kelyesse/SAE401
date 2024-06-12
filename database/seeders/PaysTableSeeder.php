<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pays = [
            ['nom' => 'France'],
            ['nom' => 'United States'],
            ['nom' => 'United Kingdom'],
            ['nom' => 'Germany'],
            ['nom' => 'Italy'],
        ];

        DB::table('pays')->insert($pays);
    }
}
