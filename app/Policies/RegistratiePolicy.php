<?php

namespace App\Policies;

use App\Models\Registratie;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RegistratiePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Registratie $registratie): bool
    {
        //
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
    public function update(User $user, Registratie $registratie): bool
    {
        if ($user->isAdmin === 1) {
            return true;
        }
        
        return $user->id === $registratie->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Registratie $registratie): bool
    {
        if ($user->isAdmin === 1) {
            return true;
        }
        
        return $user->id === $registratie->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Registratie $registratie): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Registratie $registratie): bool
    {
        //
    }
}
