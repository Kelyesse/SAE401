<?php

namespace Database\Factories;

use App\Models\Editeur;
use Illuminate\Database\Eloquent\Factories\Factory;

class EditeurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Editeur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->company,
        ];
    }
}
