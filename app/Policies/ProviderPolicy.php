<?php

namespace App\Policies;

use App\User;
use App\Provider;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderPolicy
{
    use HandlesAuthorization;



    public function before($user, $ability)
    {
        if ($user->isAdmin())
        {
            return true;
        }
    }


    /**
     * Determine whether the user can show the provider.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function show(User $user, Provider $provider)
    {
        return $user->isProvider() && $user->provider_id === $provider->id;
    }



/**
     * Determine whether the user can store providers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        return false;
    }



    /**
     * Determine whether the user can update the provider.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function update(User $user, Provider $provider)
    {
        return false;
    }

    /**
     * Determine whether the user can destroy the provider.
     *
     * @param  \App\User  $user
     * @param  \App\Provider  $provider
     * @return mixed
     */
    public function destroy(User $user, Provider $provider)
    {
        return false;
    }
}
