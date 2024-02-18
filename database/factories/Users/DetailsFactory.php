<?php

namespace Database\Factories\Users;

use App\Enums\User\BasedPlaceEnum;
use App\Enums\User\JobRoleEnum;
use App\Enums\User\PronounEnum;
use App\Enums\User\SeniorityEnum;
use App\Models\Users\Details;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailsFactory extends Factory
{
    protected $model = Details::class;

    public function definition(): array
    {
        $handle = $this->faker->userName();
        return [
            'user_id' => User::factory(),
            'company' => $this->faker->company(),
            'role' => $this->faker->randomElement(JobRoleEnum::cases()),
            'seniority' => $this->faker->randomElement(SeniorityEnum::cases()),
            'based_in' => $this->faker->randomElement(BasedPlaceEnum::cases()),
            'pronouns' => $this->faker->randomElement(PronounEnum::cases()),
            'twitter_handle' => $handle,
            'devto_handle' => $handle,
            'comments' => $this->faker->sentence(),
            'is_employed' => false,
            'switching_career' => false,
        ];
    }
}
