<?php

namespace Alalm3i\LaravelSubscription\Database\Factories;

use Alalm3i\LaravelSubscription\Tests\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * @return mixed[]
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'email' => fake()->safeEmail,
            'password' => bcrypt(Str::random(10)),
            'remember_token' => Str::random(10),
        ];
    }
}
