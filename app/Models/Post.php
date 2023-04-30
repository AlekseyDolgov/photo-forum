<?php

namespace App\Models;

use App\Filters\PostFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    /* Активная загрузка (eager loading) */
    protected $with = ['channel'];

    public function path($get)
    {
        return "/posts/{$this->channel->slug}?channel=$get";
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    public function scopeFilter($query, PostFilters $filters)
    {
        return $filters->apply($query);
    }

    public function imageIsSmaller()
    {
        $image_path = storage_path('app/public/' . $this->image_path);
        $image_size = getimagesize($image_path);

        return $image_size[0] < 400 || $image_size[1] < 400;
    }
}
