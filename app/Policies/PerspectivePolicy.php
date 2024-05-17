<?php

namespace App\Policies;

use App\Models\Perspective;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PerspectivePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(User $user, Perspective $perspective): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->active_role === 'administrator'
            ? Response::allow()
            : Response::deny("Sorry! You can't create a Perspective.");
    }

    /**
     * Determine whether the user can update the model.
     */


    public function edit(User $user, Perspective $perspective): Response
    {
        return ($perspective->creator->id === $user->id && $user->active_role === 'administrator')
            ? Response::allow()
            : Response::deny("Sorry! You can't edit this perspective.");
    }

    /**
     * Determine whether the user can delete the model.
     */
    // public function delete(User $user, Perspective $perspective): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Perspective $perspective): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Perspective $perspective): bool
    // {
    //     //
    // }
}
