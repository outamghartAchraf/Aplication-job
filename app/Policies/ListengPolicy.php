<?php

namespace App\Policies;

use App\Models\Listeng;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ListengPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Listeng $listeng): bool
    {
        return $user->id = $listeng->user_id 
        ? Response::allow()
        : " ";

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listeng $listeng): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listeng $listeng): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listeng $listeng): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listeng $listeng): bool
    {
        //
    }
}
