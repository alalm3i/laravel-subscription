<?php

namespace Alalm3i\LaravelSubscription\Database\Factories;

use Alalm3i\LaravelSubscription\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    /**
     * @return mixed[]
     */
    public function definition()
    {
        return [
            'name' => fake()->word,
            'description' => fake()->sentence,
            'price' => rand(0, 9),
            'interval' => fake()->randomElement(['month', 'year']),
        ];
    }
}
