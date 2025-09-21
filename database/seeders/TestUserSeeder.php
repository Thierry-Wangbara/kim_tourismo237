<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'sarah',
            'last_name' => 'ophenya',
            'email' => 'sarah@example.com',
            'password' => Hash::make('password'),
            'account_type' => 'tourist',
            'phone' => '+237 6XX XX XX XX',
        ]);

        User::create([
            'first_name' => 'ophenya',
            'last_name' => 'kim',
            'email' => 'kim@example.com',
            'password' => Hash::make('password'),
            'account_type' => 'site_manager',
            'phone' => '+237 640944068',
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'account_type' => 'admin',
            'phone' => '+237 6XX XX XX XX',
        ]);
    }
}