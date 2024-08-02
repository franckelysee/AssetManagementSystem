<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Equipement;
use App\Models\Maintenance;

class MaintenanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Maintenance::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'maintenance_id' => $this->faker->randomNumber(),
            'id_equipement' => $this->faker->word(),
            'date' => $this->faker->dateTime(),
            'description' => $this->faker->text(),
            'cout' => $this->faker->randomFloat(0, 0, 9999999999.),
            'etat' => $this->faker->randomElement(["en_cours","termine"]),
            'equipement_id' => Equipement::factory(),
        ];
    }
}
