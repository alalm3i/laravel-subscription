<?php

namespace Alalm3i\LaravelSubscription\Database\Factories;

use Alalm3i\LaravelSubscription\Models\Plan;
use Alalm3i\LaravelSubscription\Models\PlanFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFeatureFactory extends Factory
{
    protected $model = PlanFeature::class;

    /**
     * @return mixed[]
     */
    public function definition()
    {
        return [
            'plan_id' => Plan::factory()->create()->id,
            'code' => fake()->word,
            'value' => fake()->randomElement(['10', '20', '30', '50', 'Y', 'N', 'UNLIMITED']),
        ];
    }
}
