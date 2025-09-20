<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer des utilisateurs de test pour chaque type de compte
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'TOURISM237',
            'email' => 'admin@tourism237.com',
            'password' => Hash::make('password'),
            'account_type' => 'admin',
            'phone' => '+237 640 94 40 68',
            'location' => 'Yaoundé, Cameroun',
        ]);

        User::create([
            'first_name' => 'Marie',
            'last_name' => 'Dubois',
            'email' => 'tourist@example.com',
            'password' => Hash::make('password'),
            'account_type' => 'tourist',
            'phone' => '+237 6XX XX XX XX',
            'location' => 'Douala, Cameroun',
        ]);

        User::create([
            'first_name' => 'Jean-Pierre',
            'last_name' => 'Guide',
            'email' => 'site@example.com',
            'password' => Hash::make('password'),
            'account_type' => 'site_manager',
            'phone' => '+237 6XX XX XX XX',
            'location' => 'Foumban, Cameroun',
        ]);

    }
}
