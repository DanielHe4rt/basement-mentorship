<?php

namespace Database\Factories\Users;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users\User>
 */
class UserFactory extends Factory
{

    protected static ?string $password;

    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'github_id' => rand(11111, 99999),
            'github_username' => $this->faker->userName(),
            'description' => $this->faker->sentence(),
            'onboarded' => false,
            'password' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function onboarded(): static
    {
        return $this->state(fn(array $attributes) => [
            'onboarded' => true,
        ]);
    }
}
