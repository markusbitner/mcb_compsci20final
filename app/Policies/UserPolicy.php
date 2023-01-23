<?php

//File used for managing permissions within the site

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->email === 'mcheston@gscs.ca';
    }

    //This function is responsible for the randomness of which users are editable.
    public function edit(User $user, User $model)
    {
        return (bool) mt_rand(0, 1);
    }
}
