<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'date_of_birth',
        'email_verified',
        'profile_picture',
        'promo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'date_of_birth' => 'date',
        'email_verified' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    use HasFactory;

    // Méthode pour récupérer les amis de l'utilisateur
    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friend_requests', 'sender_id', 'receiver_id')
                    ->wherePivot('status', 'accepted')
                    ->orWherePivot('status', 'accepted')
                    ->withTimestamps();
    }
    public function inverseFriends(): BelongsToMany
{
    return $this->belongsToMany(User::class, 'friend_requests', 'receiver_id', 'sender_id')
                ->wherePivot('status', 'accepted')
                ->withTimestamps();
}
}
