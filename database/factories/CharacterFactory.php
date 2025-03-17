<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class CharacterFactory extends Factory
{
    protected $model = Character::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'level' => $this->faker->randomDigit,
            'player_name' => $this->faker->name,
            'species' => $this->faker->word,
            'alignment' => $this->faker->word,
            'details' => json_encode(['strength' => $this->faker->numberBetween(1, 20), 'dexterity' => $this->faker->numberBetween(1, 20)]),
            'password' => Hash::make('password123'),
        ];
    }
}