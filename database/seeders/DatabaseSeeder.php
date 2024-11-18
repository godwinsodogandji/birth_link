<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créez plusieurs utilisateurs avec la factory
        User::factory(15)->create();

        // Créez un utilisateur spécifique
        User::factory()->create([
            'username' => 'TestUser',
            'email' => 'test@example.com',
            'email_verified' => true,
            'date_of_birth' => '2020-01-01',
            'profile_picture' => 'profile_pictures/test_user.png',
            'promo' => 'Promo2024'
        ]);


        $this->call([
            MessagesTableSeeder::class,
        ]);
    }
}
