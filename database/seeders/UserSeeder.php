<?php

namespace Database\Seeders;

use App\Models\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'name' => 'Daniel Reis',
            'email' => 'idanielreiss@gmail.com',
            'github_id' => 6912596,
            'github_username' => 'danielhe4rt',
            'description' => 'idk',
            'onboarded' => false,
            'password' => Hash::make('secret123'),
        ]);
    }
}
