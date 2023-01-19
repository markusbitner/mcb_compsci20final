<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->email === 'arthurhaasin@gmail.com';
    }

    public function edit(User $user, User $model)
    {
        return (bool) mt_rand(0, 1);
    }
}
