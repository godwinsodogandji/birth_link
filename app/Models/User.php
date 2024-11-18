<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'profile_picture'
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
     * The attributes that should be cast.
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

    /**
     * Récupérer les amis de l'utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function friends(): BelongsToMany //Retourne les amis acceptés de l'utilisateur avec le statut accepted.
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
                    ->withPivot('status')
                    ->wherePivot('status', 'accepted')
                    ->withTimestamps();
    }

    /**
     * Récupérer les demandes d'amis en attente de l'utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pendingFriends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
                    ->withPivot('status')
                    ->wherePivot('status', 'pending')
                    ->withTimestamps();
    }

    /**
     * Récupérer les demandes d'amis envoyées par l'utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sentFriendRequests(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id')
                    ->withPivot('status')
                    ->wherePivot('status', 'pending')
                    ->withTimestamps();
    }

    /**
     * Ajouter un ami à l'utilisateur.
     *
     * @param User $friend
     * @return void
     */
    public function sendFriendRequest(User $friend): void
    {
        $this->friends()->attach($friend->id, ['status' => 'pending']);
    }

    /**
     * Accepter une demande d'ami.
     *
     * @param User $friend
     * @return void
     */
    public function acceptFriendRequest(User $friend): void
    {
        $this->friends()->updateExistingPivot($friend->id, ['status' => 'accepted']);
        $friend->friends()->updateExistingPivot($this->id, ['status' => 'accepted']);
    }

    /**
     * Rejeter une demande d'ami.
     *
     * @param User $friend
     * @return void
     */
    public function rejectFriendRequest(User $friend): void
    {
        $this->friends()->detach($friend->id);
    }

    /**
     * Bloquer un utilisateur.
     *
     * @param User $friend
     * @return void
     */
    public function blockUser(User $friend): void
    {
        $this->friends()->updateExistingPivot($friend->id, ['status' => 'blocked']);
        $friend->friends()->updateExistingPivot($this->id, ['status' => 'blocked']);
    }

    /**
     * Retirer un ami de l'utilisateur.
     *
     * @param User $friend
     * @return void
     */
    public function removeFriend(User $friend): void
    {
        $this->friends()->detach($friend->id);
    }
}
