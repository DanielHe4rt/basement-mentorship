<?php

namespace Database\Seeders;

use App\Models\Users\Details;
use App\Models\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->has(Details::factory(), 'details')
            ->onboarded()
            ->create([
                'name' => 'Daniel Reis',
                'email' => 'idanielreiss@gmail.com',
                'github_id' => 6912596,
                'github_username' => 'danielhe4rt',
                'description' => 'Just another developer',
                'password' => Hash::make('secret123'),
            ]);

    }
}
