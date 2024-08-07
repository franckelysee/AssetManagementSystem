<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Emplacement;
use App\Models\Equipement;
use App\Models\User;

class EquipementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipement::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'matricule' => $this->faker->word(),
            'nom' => $this->faker->word(),
            'type' => $this->faker->word(),
            'marque' => $this->faker->word(),
            'modele' => $this->faker->word(),
            'numero_de_serie' => $this->faker->word(),
            'date_achat' => $this->faker->dateTime(),
            'etat' => $this->faker->word(),
            'emplacement_id' => Emplacement::factory(),
            'user_id' => User::factory(),
        ];
    }
}
