<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;

class ThreadPolicy
{
    /**
     *
     * Определяем, принадлежит ли данная тема меняющему ее пользователю
     *
     * @param User $user
     * @param Thread $thread
     * @return bool
     */
    public function update(User $user, Thread $thread): bool
    {
        return $thread->user_id === $user->id;
    }
}
