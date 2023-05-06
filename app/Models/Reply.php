<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory, FavoriteTable;

    protected $guarded = [];
    /* Активная загрузка (eager loading)  */
    protected $with = ['owner', 'favorites'];
    protected $fillable = ['user_id', 'post_id', 'body', 'thread_id'];
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
