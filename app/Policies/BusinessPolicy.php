<?php

namespace App\Policies;

use App\Models\Business;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BusinessPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Business $business)
    {
        return $user->id === $business->owner_id;
    }

    public function update(User $user, Business $business)
    {
        return $user->id === $business->owner_id;
    }

    public function delete(User $user, Business $business)
    {
        return $user->id === $business->owner_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    

    
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Business $business): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Business $business): bool
    {
        return false;
    }
}
