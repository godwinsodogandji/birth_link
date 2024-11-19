<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message; // Importez le modèle Message
use Faker\Factory as Faker;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Créez une instance de Faker

        // Insérez 10 enregistrements fictifs dans la table messages
        for ($i = 0; $i < 10; $i++) {
            Message::create([
                
                
                'title' => $faker->sentence(3), // Génère un titre aléatoire
                'text' => $faker->paragraph(3), // Génère un contenu de message aléatoire
                'photo' => $faker->imageUrl(640, 480, 'nature'), // Génère une URL d'image aléatoire
            ]);
        }
    }
}
