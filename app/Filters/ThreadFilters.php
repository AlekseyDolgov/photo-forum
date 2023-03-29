<?php

namespace App\Filters;

use App\Models\User;

class ThreadFilters extends Filters
{
    protected $filters = ['by', 'popular', 'answered'];
    /*фильтрация по имени пользователя */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }
    /*сортировка по популярности */
    protected function popular()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->orderBy('replies_count', 'desc');
    }
    /*фильтрация (и сортировка) по количеству ответов */
    protected function answered()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder
            ->whereHas('replies')
            ->orderBy('replies_count', 'desc');
    }
}
