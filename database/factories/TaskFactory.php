<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'module_id' => Module::factory(),
            'title' => $this->faker->sentence(),
            'thumbnail_url' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
            'deadline' => now(),
            'tips' => [
                $this->faker->sentence(),
                $this->faker->sentence(),
                $this->faker->sentence(),
            ]
        ];
    }
}
