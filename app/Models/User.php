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

    protected $fillable = [
        'username', 'email', 'password', 'date_of_birth', 'email_verified', 'profile_picture'
    ];

    // Définition des relations d'amitié
    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
                    ->withPivot('status')
                    ->wherePivot('status', 'accepted')
                    ->withTimestamps();
    }

    public function pendingFriends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
                    ->withPivot('status')
                    ->wherePivot('status', 'pending')
                    ->withTimestamps();
    }

    public function sentFriendRequests(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friendships', 'friend_id', 'user_id')
                    ->withPivot('status')
                    ->wherePivot('status', 'pending')
                    ->withTimestamps();
    }

    public function sendFriendRequest(User $friend): void
    {
        if (!$this->isFriendWith($friend)) {
            $this->friends()->attach($friend->id, ['status' => 'pending']);
        }
    }

    public function acceptFriendRequest(User $friend): void
    {
        $this->friends()->updateExistingPivot($friend->id, ['status' => 'accepted']);
        $friend->friends()->updateExistingPivot($this->id, ['status' => 'accepted']);
    }

    public function rejectFriendRequest(User $friend): void
    {
        $this->friends()->detach($friend->id);
    }

    public function blockUser(User $friend): void
    {
        $this->friends()->updateExistingPivot($friend->id, ['status' => 'blocked']);
        $friend->friends()->updateExistingPivot($this->id, ['status' => 'blocked']);
    }

    public function removeFriend(User $friend): void
    {
        $this->friends()->detach($friend->id);
    }

    public function isFriendWith(User $user): bool
    {
        return $this->friends()->where('friend_id', $user->id)->exists();
    }

    
}
