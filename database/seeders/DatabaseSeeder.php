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
        $module = Module::factory()
            ->create();

        foreach (range(1, 3) as $i) {
            $task = Task::factory()->create(['module_id' => $module->id, 'order' => $i]);
            Todo::factory()->create(['task_id' => $task->id]);
        }
    }
}
