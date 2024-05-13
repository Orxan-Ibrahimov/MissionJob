<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GroupPolicy
{
    public function create(User $user): Response
    {
        return $user->active_role === 'head-teacher'
            ? Response::allow()
            : Response::deny("Sorry! You can't create a group.");
    }

    /**
     * Determine whether the user can update the model.
     */
    public function edit(User $user, Group $group): Response
    {
        return $group->head_teacher->id === $user->id
            ? Response::allow()
            : Response::deny("Sorry! You can't edit this group.");
    }
    public function update(User $user, Group $group): Response
    {
        return $group->user->is($user)
            ? Response::allow()
            : Response::deny("Sorry! You can't' update this group.");
    }
}
