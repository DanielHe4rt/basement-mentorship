<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Module;
use App\Models\Task\Task;
use App\Models\Task\Todo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $module =  Module::factory()
            ->create();

        $tasks = Task::factory()->count(3)->create(['module_id' => $module->id]);

        $tasks->each(fn (Task $task) => Todo::factory()->create(['task_id' => $task->id]));
    }
}
