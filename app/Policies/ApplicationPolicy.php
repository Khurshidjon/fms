<?php

namespace App\Policies;

use App\User;
use App\Application;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the application.
     *
     * @param  \App\User  $user
     * @param  \App\Application  $application
     * @return mixed
     */
    public function view(User $user, Application $application)
    {
        if ($user->organ_id === $application->from_city_id || $user->organ_id === $application->to_city_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create applications.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the application.
     *
     * @param  \App\User  $user
     * @param  \App\Application  $application
     * @return mixed
     */
    public function update(User $user, Application $application)
    {
        if ($user->organ_id === $application->from_city_id || $user->organ_id === $application->to_city_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }
    public function edit(User $user, Application $application)
    {
        if ($user->id == $application->user_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }
    /**
     * Determine whether the user can delete the application.
     *
     * @param  \App\User  $user
     * @param  \App\Application  $application
     * @return mixed
     */
    public function delete(User $user, Application $application)
    {
        if ($user->organ_id === $application->from_city_id || $user->organ_id === $application->to_city_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the application.
     *
     * @param  \App\User  $user
     * @param  \App\Application  $application
     * @return mixed
     */
    public function restore(User $user, Application $application)
    {
        if ($user->id == $application->user_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the application.
     *
     * @param  \App\User  $user
     * @param  \App\Application  $application
     * @return mixed
     */
    public function forceDelete(User $user, Application $application)
    {
        if ($user->organ_id === $application->from_city_id || $user->organ_id === $application->to_city_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }
}
