<?php

namespace App\Policies;

use App\User;
use App\Contract;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContractPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the contract.
     *
     * @param  \App\User  $user
     * @param  \App\Contract  $contract
     * @return mixed
     */
    public function view(User $user, Contract $contract)
    {
        if ($user->id === $contract->user_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create contracts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the contract.
     *
     * @param  \App\User  $user
     * @param  \App\Contract  $contract
     * @return mixed
     */
    public function update(User $user, Contract $contract)
    {
        if ($user->id === $contract->user_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the contract.
     *
     * @param  \App\User  $user
     * @param  \App\Contract  $contract
     * @return mixed
     */
    public function delete(User $user, Contract $contract)
    {
        if ($user->id === $contract->user_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the contract.
     *
     * @param  \App\User  $user
     * @param  \App\Contract  $contract
     * @return mixed
     */
    public function restore(User $user, Contract $contract)
    {
        if ($user->id === $contract->user_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the contract.
     *
     * @param  \App\User  $user
     * @param  \App\Contract  $contract
     * @return mixed
     */
    public function forceDelete(User $user, Contract $contract)
    {
        if ($user->id === $contract->user_id || $user->hasRole('Admin')){
            return true;
        }
        return false;
    }
}
