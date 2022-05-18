<?php

namespace App\Policies;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    public function like(User $user, Photo $photo)
    {
        return !$photo->likes()->where('user_id', $user->id)->exists();
    }
}
