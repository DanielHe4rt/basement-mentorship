<?php

namespace Database\Seeders;

use App\Enums\Module\ModuleAttendanceEnum;
use App\Models\Module\Module;
use App\Models\Users\Details;
use App\Models\Users\ModuleAttendance;
use App\Models\Users\User;
use Illuminate\Database\Seeder;

class ModuleAttendanceSeeder extends Seeder
{
    public function run(): void
    {
        Module::factory()->count(2)->create();
        $users = User::factory()->has(Details::factory(), 'details')
            ->count(10)
            ->create();

        $users->each(function (User $user) {
            // Since it has a previously "production" module, I decided to add two new modules to testing purposes.
            $moduleId = rand(1, 3);
            /** @var ModuleAttendanceEnum $statusCases */
            $statusCases = collect(ModuleAttendanceEnum::cases())->shuffle()->first();

            $user->modules()->attach($moduleId, ['status' => $statusCases]);
        });

    }
}
