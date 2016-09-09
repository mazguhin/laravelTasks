<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(\App\User $user, \App\Task $task)
    {
        return $user->id === $task->user_id;
    }

    public function delete(\App\User $user, \App\Task $task)
    {
        return $user->id === $task->user_id;
    }
}
