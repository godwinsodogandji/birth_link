<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('friendships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Référence à l'utilisateur
            $table->foreignId('friend_id')->constrained('users')->onDelete('cascade'); // Référence à l'ami
            $table->enum('status', ['pending', 'accepted', 'declined', 'blocked'])->default('pending'); // Statut de l'amitié
            $table->timestamps(); 

             // Assurer que la relation entre un utilisateur et son ami est unique, peu importe l'ordre des IDs
            $table->unique(['user_id', 'friend_id']);
            $table->unique(['friend_id', 'user_id']); // pour éviter des doublons inversés
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendships');
    }
};
