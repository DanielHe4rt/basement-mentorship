<?php

namespace Database\Factories;

use App\Models\Module\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{

    protected $model = Module::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'thumbnail_url' => 'https://http.cat/' . $this->faker->randomElement([200, 201, 420, 404, 500, 422, 301, 302])
        ];
    }
}
