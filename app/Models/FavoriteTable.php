<?php

namespace App\Models;

trait FavoriteTable
{
    /* Полиморфное отношение – получаем все голоса за сообщения */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    /* Сохраняем новый голос за сообщение */
    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()];
        if (!$this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    /* Проверяем голосовал ли уже этот пользователь за это сообщение
     * (используется в reply.blade.php)
     */
    public function isFavorited()
    {
        return !! $this->favorites->where('user_id', auth()->id())->count();
    }

    /* Получаем количество голосований за сообщение
     * (используется в reply.blade.php)
     */
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}
