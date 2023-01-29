<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function read(User $user, User $userTarget)
    {
        return true;
    }
    public function delete(User $user, User $userTarget)
    {
        return $user->id === $userTarget->id;
    }
}
