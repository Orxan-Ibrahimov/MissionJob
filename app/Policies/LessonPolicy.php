<?php

namespace App\Policies;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LessonPolicy
{
    
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->active_role === 'head-teacher'
            ? Response::allow()
            : Response::deny("Sorry! You can't create a lesson.");
    }

    // /**
    //  * Determine whether the user can update the model.
    //  */
    // public function update(User $user, Lesson $lesson): bool
    // {
    //     //
    // }

    
}
