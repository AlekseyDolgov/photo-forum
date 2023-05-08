<?php

namespace App\Models;

use App\Filters\PostFilters;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path($get)
    {
        return route('posts.index', [$this->thread->slug, 'id' => $get]);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function threads()
    {
        return $this->belongsTo(Thread::class);
    }

    public function pathUrl()
    {
        return "posts/{$this->thread->slug}";
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

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
