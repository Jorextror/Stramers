<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category' => $this->faker->randomElement(['normal','epica','legendaria']),
            'type' => $this->faker->randomElement(['spell','minion']),
            'cost' => $this->faker->numberBetween(1,10),
            'dmg' => $this->faker->numberBetween(1,10),
            'life' => $this->faker->numberBetween(1,10),
            'usos' => $this->faker->numberBetween(1,10),
            'text' => $this->faker->text(),
            'img' => '/testing/test.jpg',
            'obtainable' => true
        ];
    }
}
