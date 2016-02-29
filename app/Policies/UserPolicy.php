<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $userLogged, User $user)
    {
        return $userLogged->id === $user->id;
    }
}
