<?php

namespace Database\Factories;

use App\Models\Auteur;
use App\Models\Pays;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuteurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Auteur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'bibliographie' => $this->faker->paragraph,
            'id_nationalite' => Pays::factory(), // Assuming you have a PaysFactory
        ];
    }
}
