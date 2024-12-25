<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'userType' => 'admin',
            'password' => Hash::make('admin@example.com'),
        ]);

        User::create([
            'name' => 'Buyer',
            'email' => 'buyer@example.com',
            'userType' => 'user',
            'password' => Hash::make('buyer@example.com'),
        ]);
    }
}
